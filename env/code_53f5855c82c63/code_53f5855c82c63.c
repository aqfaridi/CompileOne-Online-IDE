#include<stdio.h>

void xyz(unsigned char *string31);
main()
{
    unsigned char *string1="123456";
    xyz(string1);
}

void xyz(unsigned char *string31)
{
    printf("%s",string31);
}
