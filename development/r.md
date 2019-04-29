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
* sum
    * `sum(x)`: calculate total of elements in `x`
    * `cumsum(x)`: cumulative summation.
* `length(x)`: the number of elements in `x`
* `data.frame(x)`: creates data frames
* rounding
    * `round(x)`: round values
    * `ceiling(x)`: round up values
    * `floor(x)`: round down valoues
* calculation
    * `sqrt(x)`: square

#### Calculate relative frequency

```r
freq <- table(x)
freq / sum(freq)
```

## Read csv

* `read.csv(path)`
    ```r
    x <- read.csv(path)
    ```

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

### Boxplot

* Quartiles: numbers that separate the data into quarters.
    * Q1 - 1st quartile: middle value of the lower half of the data
    * Q2 - 2nd quartile (median): if there are even number of observations, median is the average of the central 2 observations.
    * Q3 - 3rd quartile: middle value of the upper half of the data
