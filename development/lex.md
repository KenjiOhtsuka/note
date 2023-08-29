---
layout: page
title: Lex
---

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

### Number recognition

```lex
%%
[0-9][0-9]*    printf("%s\n", yytext);
%%
```

### Name, positive number, and some keywords

```lex
%{
  int lineno;
%}
DIGIT [0-9]
ID    [a-z][a-z0-9]
%%
{DIGIT}+            printf("int: %s\n", yytext);
{DIGIT}+"."{DIGIT}* printf("float: %s\n", yytext);
{ID}                printf("id: %s\n", yytext);
if                  printf("if\n");
else                printf("else\n");
then                printf("then\n");
while               printf("while\n");
for                 printf("for\n");
";"                 printf("semicolon\n");
%%
```
