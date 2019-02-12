---
layout: page
---

# Lex

### Format

```lex
definition part
%%
token rule
%%
C program
```

## Process

1. generate C language

    ```sh
    lex test.lex
    ```
    
2. generate program

    ```sh
    cc lex.yy.c --ll
    ```
    
3. execute `a.out`

## Examples

### For number recognition

```lex
%%
[0-9][0-9]*    printf("%s\n", yytext);
%%
```
