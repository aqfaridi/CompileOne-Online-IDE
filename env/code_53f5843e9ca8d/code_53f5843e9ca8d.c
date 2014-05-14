#include<stdio.h>

void display1(char *string13);
main()
{
    char string1[]="Hello World";
    display1("Hello World");
}

void display1(char *string13)
{
    printf("%s",string13);
}
