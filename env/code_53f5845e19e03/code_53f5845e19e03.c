#include<stdio.h>

void display1(char *string13);
main()
{
    char string1[]="Hello World";
    display1(string1);
}

void display1(char *string1)
{
    printf("%s",string1);
}
