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
    
### Term

* statistic: a number that is a property of the sample.
* parameter: a number that is a property of all data
* average: mean
* proportion: a ratio of the observations in the specific category by all the number of data
    
### Useful functions

* `table(x)`
* `summary(x)`
* `names(x)`: show column names
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
* `getwd()`: get working directory

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
    * Q1 < Q2 < Q3
* Inter-Quartile Range: \[ Q1 - IQR * 1.5, Q3 + IQR * 1.5 \] (\[ 2.5 Q1 - 1.5 Q3, 2.5 Q3 - 1.5 Q1 \])
    * IQR = Q3 - Q1
