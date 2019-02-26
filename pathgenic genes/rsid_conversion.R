
#package that allows for R interactions with NCBI APIs
# install.packages("rentrez")

#take in CSV files, isolate the RsID column and turn it into a data frame
rsids <- read.csv(file = "GSA-24v2-0_A1_b150_rsids.csv")
RSID <- rsids$RsID
RSIDD <- as.data.frame(RSID)

# install.packages("tidyr")
# install.packages("dplyr")

#Separate RSID that have multiple values in one row and give them their own row separating by ","
library(dplyr); library(tidyr)
RSIDDD <- RSIDD %>%
mutate(RSID = strsplit(as.character(RSID),",")) %>%
unnest(RSID)

#subset dataset to exclude rows with "."
subID <- subset(RSIDDD, RSID != ".")

#  ------ search fromm cliinvar --------

subID$g37 = subID$loc37 = subID$g38 = subID$loc38 = NA
library(rentrez)

for (row in 1:nrow(subID)){
  i = subID$RSID[row]
  cat("\n i: ", i)
  result = entrez_search(db = "clinvar", term = i)
  if (length(result$ids) > 0){
      id = result$ids
      summary = entrez_summary(db = "clinvar", id = id)
      if (!isnull(summary$variation_set$variation_loc)){
        g38 = summary$variation_set$variation_loc[[1]]$start[1]
        g37 = summary$variation_set$variation_loc[[1]]$start[2]
        chr38 = summary$variation_set$variation_loc[[1]]$chr[1]
        chr37 = summary$variation_set$variation_loc[[1]]$chr[2]
      }
      if (length(result$ids) > 1) {
        cat("multiple records found")
      }
      subID$g37[row] = g37
      subID$loc37[row] = chr37
      subID$g38[row] = g38
      subID$loc38[row] = chr38
  }
}

library(parallel)
l = ceiling(nrow(subID)/8)
rows = list(1:l, 
         l + 1: 2*l,
         2*l + 1 : 3*l,
         3*l + 1 : 4*l,
         4*l + 1 : 5*l,
         5*l + 1 : 3*l,
         6*l + 1 : 7*l,
         7*l + 1 : 8*l)

library(rentrez)
run = function(row, data = subID){
    subdata = data[row,]
    for (r in 1:nrow(subdata)){
      i = subdata$RSID[r]
      result = entrez_search(db = "clinvar", term = i)
      if (length(result$ids) > 0){
        id = result$ids
        summary = entrez_summary(db = "clinvar", id = id)
        if (!is.null(summary$variation_set$variation_loc)){
          g38 = summary$variation_set$variation_loc[[1]]$start[1]
          g37 = summary$variation_set$variation_loc[[1]]$start[2]
          chr38 = summary$variation_set$variation_loc[[1]]$chr[1]
          chr37 = summary$variation_set$variation_loc[[1]]$chr[2]
        }
        subdata$g37[r] = g37
        subdata$loc37[r] = chr37
        subdata$g38[r] = g38
        subdata$loc38[r] = chr38
      }
    }  
    return(subdata)
}


cl<-makeCluster(8)
clusterExport(cl = cl,  varlist = c("subID"))
clusterEvalQ(cl, {
  library(rentrez)
})

result = parLapply(cl, rows, run)
