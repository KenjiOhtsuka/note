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



