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
* `median(x)`: median
* `IQR(x)`: width of interquartile range
* `quantile(x)`: shows quantiles
* sum
    * `sum(x)`: calculate total of elements in `x`
    * `cumsum(x)`: cumulative summation.
* `length(x)`: the number of elements in `x`
* `data.frame(x)`: creates data frames
* rounding
    * `round(x, d)`: round values. second parameter represents decimal point.
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
    
## Utility functions

### T value calculation from samples

* `x`: vector of observations
* `target`: mean value

```r
# calculate T value
tv <- function (x, target=0) {
  (mean(x) - target) / sqrt(var(x) / length(x))
}
```

### Mean Squared Error

* `x`: vector of observations
* `population`

```r
mse <- function (x, population) {
  var(x) + (mean(x) - population)^2
}
```

### degree of freedom


```r
dfv <- function (v_a, n_a, v_b, n_b) {
  (v_a + v_b) ^ 2 / (v_a ^ 2 / (n_1 - 1) + v_b ^ 2 / (n_2 - 1))
}

dfs <- function (s_a, n_a, s_b, n_b) {
  dfv(s_a ^ 2, n_a, s_b ^ 2, n_b)
}
```

```r
ttmv <- function (m_a, v_a, n_a, m_b, v_b, n_b) {
  (m_a - m_b) / sqrt(v_a / n_a + v_b / n_b)
}

ttms <- function (m_a, s_a, n_a, m_b, s_b, n_b) {
  ttmv(m_a, s_a ^ 2, n_a, m_b, s_b ^ 2, n_b)
}
```

### Confidence interval

* `m`: sample mean
* `s`: sample standard derivation
* `n`: the number of samples
* `significance_level`

```r
confint_ns <- function (m, s, n, significance_level = 0.95) {
  m + qnorm(c(0, 1) + c(1, -1) * (1 - significance_level) / 2) * s / sqrt(n)
}
```

```r
confing_nv <- function (m, v, n, significance_level = 0.95) {
  confint_ns(m, sqrt(v), n, significance_level)
}

confint_nx <- function (x, significance_level = 0.95) {
  confint_ns(mean(x, na.rm=TRUE), sd(x, na.rm=TRUE), sum(!is.na(x)), significance_level)
}

confint_p <- function (p, n, significance_level = 0.95) {
  p + qnorm(c(0, 1) + c(1, -1) * (1 - significance_level) / 2) * sqrt(p * (1 - p) / n)
}

confint_px <- function (x, n, significance_level = 0.95) {
  confint_p(x / n, n, significance_level)
}

confint_t <- function (df, significance_level = 0.95) {
  qt(c(0, 1) + c(1, -1) * (1 - significance_level) / 2, df)
}

confint_ms <- function (m, s, n, significance_level = 0.95) {
  m + confint_t(n - 1, significance_level) * s / sqrt(n)
}

confint_mv <- function (m, v, n, significance_level = 0.95) {
  confint_ms(m, sqrt(v), n, significance_level)
}

confint_vs <- function (s, n, significance_level = 0.95) {
  confint_vv(s ^ 2, n, significance_level)
}

confint_vv <- function (v, n, significance_level = 0.95) {
  (n - 1) * v / qchisq(c(1, 0) + c(-1, 1) * (1 - significance_level) / 2, n - 1)
}
```

### Required Sample Size calculation

* `p`: estimaterd proportion.
* `diff`: permitted proportion difference
* `confidence_level`

```r
sample_size <- function (p, diff, confidence_level = 0.95) {
  (qnorm(1 - (1 - confidence_level) / 2) * sqrt(p * (1 - p)) / diff)^2
}
```
