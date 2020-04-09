---
layout: page
---

# Database Basic Knowledge

## Comparing to File saving system

* Disadvantage of file saving such as spreadsheet
  * Data redundancy
    * Inconsistency in data format
    * The same information being kept in several different places (files)
    * Data inconsistency, a situation where various copies of the same data are conflicting, wastes storage space and
duplicates effort
  * Data isolation
    * it is difficult to pick up the target data, because it is saved in multiple files.
  * Integrity problems
    * Data values must satisfy certain consistency constraints that are specified in the application programs.
    * It is difficult to make changes to the application programs in order to enforce new constraints.
  * Security problems
    * There are constraints regarding accessing privileges.
    * Application requirements are added to the system in an ad-hoc manner so it is difficult to enforce constraints.
  * Concurrency access
  
## Datapase properties

* a representation of some aspect of the real world or a collection of data elements (facts) representing realworld information.
* logical, coherent and internally consistent.
* designed, built and populated with data for a specific purpose.
* Each data item is stored in a field.
* A combination of fields makes up a table.

## Database System

* self-describing
  * it not only contains the database itself, but also metadata which defines and describes the data and relationships between tables in the database. 

* relational database
  * data is stored in a tabular form
* hierarchical database
  * data is stored in a tree structure form
* network database
  * data is stored in a graph
  
### DBMS

DBMS is a set of software tools that control access, organize, store, manage, retrieve, and maintain data in a database.

## Model

* information model
  * an abstract, formal representation of entities that includes their properties, relationships and the operations that can be performed on them
  * The main purpose is to model managed objects at a conceptual level, independent of any specific implementations or protocols used to transport the data
  * it defines relationships between managed objects
* data model
  * defined at a more concrete level and include many details.
  * the blueprint of any database system.

**Information model is conceptual, data model is concrete.**

## Role

### Data Architect

Sometimes called Data Modeller

#### Fundamental skill

* Logical Data Modeling
* Physical Data Modeling
* Development of a data strategy and associated policies
* Selection of capabilities and systems to meet business information needs

### Database Architect

Responsible for:

* gather and document requirements from business users and management and address them in a solution architecture
* share the architecture with business users and management
* create and enforce database and application development standards and processes
* create and enforce service level agreements for the business, specially addressing high availability, backup/restore and security.
* study new products, versions compatibility, and deployment feasibility and give recommendations to development teams and management
* understand hardware, operating system, database system, multi-tier component architecture and interaction between these components.
* prepare high-level documents in-line with requirements
* review detailed designs and implementation details

### Database Administrator

DBA is responsible for the maintenance, performance, integrity and security of the DB.
And sometimes DBA is required to plan, develop and troubleshoot.

* establishing the needs of users and monitoring user access and security
* monitoring performance and managing parameters to provide fast query responses to front-end users
* mapping out the conceptual design for a planned database in outline
* take into account both, back-end organization of data and front-end accessibility for end users.
* refining the logical design so that it can be translated into a specific data model
* further refining the physical design to meet system storage requirements
* installing and testing new versions of the database management system
* maintaining data standards including adherence to the data protection act
* writing database documentation including data standards, procedures and definitions for the data dictionary (metadata)
* controlling access permissions and privileges
* developing, managing, and testing backup and recovery plans
* ensuring that storage, archiving , backup and recovery procedures are functioning
* capacity planning 
* working closely with it project managersm database programmers and web developers
* communicating regulary with technical, applications and operational staff to ensure database integrity and security
* commissioning and installing new applications

### Application Developer

* integrated database application development
