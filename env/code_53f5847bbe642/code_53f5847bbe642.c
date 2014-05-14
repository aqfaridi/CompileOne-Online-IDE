#include<stdio.h>

void xyz(char *string1);
main()
{
    char string1[]="Hello World";
    xyz(string1);
}

void xyz(char *string1)
{
    printf("%s",string1);
}
