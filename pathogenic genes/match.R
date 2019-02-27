# ----------- GSA match --------------
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

# read clinvar list
clinvar = read.csv("clinvar_result_porphyria.csv")

#subset dataset to exclude rows with "."
subID <- subset(RSIDDD, RSID != ".")

# loop through clinvar list to search for rsid
library(rentrez)
outtable = clinvar
outtable$rsid = outtable$url = outtable$illumina_match = ""
for (r in 1:nrow(clinvar)){
  print(r)
  vid = clinvar$VariationID[r]
  clinvar_record = entrez_summary(db = "clinvar", id = vid)
  
  # external references
  xref = clinvar_record$variation_set$variation_xrefs[[1]]
  
  if ("dbSNP" %in% xref$db_source){
    # if rsid is in external reference, try to lookup on illumnina
    rsid = xref$db_id[xref$db_source == "dbSNP"]
    rsid  = paste("rs", rsid, sep = ""); cat(" ", rsid)
    outtable$rsid[r] = rsid
    outtable$url[r] = paste("https://www.ncbi.nlm.nih.gov/clinvar/variation/", rsid, sep = "")
    
    # match:
    if (rsid %in% subID$RSID){
      outtable$illumina_match[r] = TRUE
    } else {
      outtable$illumina_match[r] = FALSE
    }
    
  } else {
    next
  }
}

write.csv(outtable, "output_gsa.csv")

# ----------------OmniExpress------------------------
# read clinvar list
clinvar = read.csv("clinvar_result_porphyria.csv")

# Omni list
Omni = read.csv("InfiniumOmniExpress.csv")
RSID = Omni$InfiniumOmniExpress
RSID = as.character(RSID)

# loop through clinvar list to search for rsid
library(rentrez)
outtable = clinvar
outtable$rsid = outtable$url = outtable$illumina_match = ""
for (r in 1:nrow(clinvar)){
  print(r)
  vid = clinvar$VariationID[r]
  clinvar_record = entrez_summary(db = "clinvar", id = vid)
  
  # external references
  xref = clinvar_record$variation_set$variation_xrefs[[1]]
  
  if ("dbSNP" %in% xref$db_source){
    # if rsid is in external reference, try to lookup on illumnina
    rsid = xref$db_id[xref$db_source == "dbSNP"]
    rsid  = paste("rs", rsid, sep = "")
    outtable$rsid[r] = rsid
    outtable$url[r] = paste("https://www.ncbi.nlm.nih.gov/clinvar/variation/", vid, sep = "")
    
    # match:
    if (rsid %in% RSID){
      outtable$illumina_match[r] = TRUE
    } else {
      outtable$illumina_match[r] = FALSE
    }
    
  } else {
    next
  }
}

write.csv(outtable, "output_omni.csv")
