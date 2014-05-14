#include<stdio.h>

void xyz(char *string1);
main()
{
    unsigned char string1[]="123456";
    xyz(string1);
}

void xyz(unsigned char *string1)
{
    printf("%s",string1);
}
