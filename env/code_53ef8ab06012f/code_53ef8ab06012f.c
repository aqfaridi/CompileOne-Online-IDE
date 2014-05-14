#include <stdio.h>
 
int main(void)
{
    char str[128];
 
    printf("Enter a string: ");
    scanf("%[^o]s", str);
 
    printf("You entered: %s\n", str);
 
    return 0;
}