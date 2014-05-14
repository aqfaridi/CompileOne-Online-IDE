#include<stdio.h>
//#include<string.h>

void xyz(char *string31);
main()
{
    char string1[]="123456";
    xyz(string1);
}

void xyz(char *string31)
{
    printf("%s",string31);
}
