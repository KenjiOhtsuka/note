---
layout: page
---

# R

## Data Type

| name | description|
|:--|:--|
| factor | Factor or Quanlitative data |
| numeric | Quantatitive data. descrete or continuous. |

## Basic

* Assignment

    ```r
    x <- c(1, 2, 3, 4, 5)
    ```
    
### Useful functions

* `table(x)`
* `summary(x)`
* `sd(x)`: standard derivation
* `var(x)`: variance
* `mean(x)`: mean
* `sum(x)`: calculate total of elements in `x`
* `length(x)`: the number of elements in `x`
* rounding
    * `round(x)`: round values
    * `ceiling(x)`: round up values
    * `floor(x)`: round down valoues
* calculation
    * `sqrt(x)`: square

## Read csv

* `read.csv(path)`

## Directory operation

* `dir()`: show directory contents
* `setwd(path)`: set working directory
* `pwd()`: print working directory

## Dataframe operation

* `dataframe$column`: data of the column

## Graph

* `plot(x)`

    ```r
    plot(table(x)
    ```
    
* `boxplot(x)`
* `hist(x)`: histogram
