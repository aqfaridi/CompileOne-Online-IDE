#include<stdio.h>
main()
{
    char c;
    printf("enter the alphabet");
    scanf("%c",&c);
    if(c=='a'||c=='e'||c=='i'||c=='o'||c=='u')
        printf("c is a vowel.",c);
    else
        printf("c is a constant.",c);
        return 0;
}