# UPWARD: Uniting People Working Against Rare Diseases

*Table of Contents*

1. [**Background**](https://github.com/NCBI-Hackathons/Community_PhenGen#background)
2. [**Methods**](https://github.com/NCBI-Hackathons/Community_PhenGen#methods)
3. [**Results**](https://github.com/NCBI-Hackathons/Community_PhenGen#results)
4. [**Members**](https://github.com/NCBI-Hackathons/Community_PhenGen#members)
5. [**Documentation**](https://github.com/NCBI-Hackathons/Community_PhenGen#documentation)

### Background:
Porphyria is a group of eight inherited genetic disorders that arise when the body is unable to synthesize heme used to transport oxygen throughout the body. This negatively affects the skin and/or nervous system causing symptoms including extreme abdominal and chest pain, skin blistering, vomiting, confusion, constipation, fever, high blood pressure, and possibly leading to paralysis, low blood sodium levels, and seizures.

Porphyria is divided into two main types, acute and cutaneous, depending on the most commonly experienced symptoms. Acute Porphyrias typically present with attacks of symptoms, like intense abdominal pain or skin blistering, which become more severe over several days. Cutaneous Porphyrias may result in skin blistering, redness, scarring, and pain when exposed to the sun.

Likely affecting 1 to 100 people in every 50,000, Porphyria is a rare disease which on average takes 10-15 years to diagnose following the onset of symptoms. Once Porphyria is recognized diagnostic testing can be performed via blood, urine, stool and genetic testing.

*Data-driven discovery of rare disease determinants*

UPWARD: Uniting People Working Against Rare Diseases, is a Health Insurance Portability and Accountability Act (HIPAA) compliant database which will allow people with rare diseases to declare interest in participating in research studies, and share their personal disease stories, phenotypes, and consumer genetic testing data with researchers and clinicians. This information with be compiled and analyzed within UPWARD using, in part, a program which identifies all rare-disease-related pathogenic or likely pathogenic Single Nucleotide Polymorphisms (SNPs) that are currently included on SNP microarray chips used by common consumer genetic testing companies. The goal of this platform is to facilitate data-driven discovery of rare disease determinants by leveraging the growing data of consumer genomics to discover genetic determinants related to modifiers and penetrance in rare diseases. To facilitate use of this database, UPWARD has focused its tools to benefit people living with porphyria, and porphyria research as a whole. 

When a person with porphyria (diagnosed or suspected) accesses UPWARD they are met with a survey built to collect disease, phenotype, genetic, and environmental data along with consent, contact information and factors believed to trigger porphyria symptoms. They are also given the option to share this survey with family members and friends, both those with and without Porphyria symptoms. Although family members without symptoms at the time of the survey and friends will likely never develop symptoms (due to the low penetrance of the porphyria-associated genes), by comparing genotypes of these individuals with those of people with latent and active porphyria we hope to identify modifying genes and environmental factors that contribute to the phenotype. To recruit individuals we plan to add links to UPWARD to the SNPedia research database, along with collaborating with Porphyria advocacy and patient education groups, and clinician partners.

### Methods:

![flowchart](https://github.com/NCBI-Hackathons/Community_PhenGen/blob/master/UPWARD.png)

*Implementation*

To build a database of pathogenic or likely pathogenic SNPs, we have sourced Rapid Stain Identification Series (RSID) information from the Illumina OmniExpress & Illumina GSA microarray chips (used by Ancestry and 23andMe respectively to carry out DNA analysis) and filtered out genes using the NCBI ClinVar database to yield an output of Porphyria related genetic polymorphisms and their associated RSID, SNP location, and degree of pathogenicity. The database will also capture the following information: 1) patient-reported phenotype and symptom information of people identified as potentially carrying a pathogenic or likely pathogenic variant in a porphyria gene and 2) people with a clinical diagnosis of Porphyria, as well as information on their family members to try to capture data on asymptomatic people.

We are storing our participants’ genomics raw data and environmental data in a non-relational database. We built a HIPAA compliant human subject meta-information database in the next iteration of the development. Our system currently consists of a cloud database built upon MongoDB Community Edition, and a web server run through NGINX to accept input data from participants. We chose to use a non-relational database because it has been proven to be more efficient than a relational database when dealing with genomic data,. The entire system is containerized and orchestrated by [Docker Compose](https://docs.docker.com/compose/) so that this study can easily be replicated by individuals who are interested in using the same methodology for diseases other than Porphyria.

HIPPA compliance is satisfied by:

- Authentication: securely authenticate user access
- Authorization: assign user roles and privileges
- Auditing: maintain a CRUD log
- Encryption: TBD 

*Operation*

  **Requirements:** The only requirement to build this system is having [Docker](https://docs.docker.com/install/) and [Docker Compose](https://docs.docker.com/compose/install/) installed on your machine.
  
  **Running:**
  
  - clone this repository: `git clone https://github.com/NCBI-Hackathons/Community_PhenGen`
  
  - And start Docker containers: `cd Community_PhenGen && sudo docker-compose up`
  
  - In order to change security settings for the database, you need to change [these lines](https://github.com/NCBI-Hackathons/Community_PhenGen/blob/f6c0638d409b9ab5619b2db9961c84d259fc5c62/docker-compose.yml#L13-L15) from the source code.

### Results:

[UPWARD: Uniting People Working Against Rare Diseases](http://www.raysjianglab.org/DDDD.php)

[Presentation: Learn more](https://docs.google.com/presentation/d/1AcBlLJ51WDNSG8RY25YOSZpFn9xUOBcb2t6nJCRqMwk/edit?usp=sharing)

### Members:
Rays Jiang - [ray-jiang](https://github.com/ray-jiang) - Jiang2@health.usf.edu 

Renee Fonseca - [reneemf](https://github.com/reneemf) - reneefonseca@mail.usf.com

Minh Pham - [minhhpham](https://github.com/minhhpham) - minhpham@mail.usf.edu 

Deborah Cragun - dcragun@health.usf.edu 

Luis Tañon Reyes - [luistanonreyes](https://github.com/luistanonreyes) - luistanon@mail.usf.edu

Alex Dean - [deansmacked](https://github.com/deansmacked) - daviddean@health.usf.edu

Krishna Sharma - [ksharma1205](https://github.com/ksharma1205) - sharmak@mail.usf.edu

### Documentation:
[Poster](https://drive.google.com/file/d/1NRJ_itYHL1b97HSHVbhl2bHhk5AsADaM/view?usp=sharing)
Publication: Coming soon
