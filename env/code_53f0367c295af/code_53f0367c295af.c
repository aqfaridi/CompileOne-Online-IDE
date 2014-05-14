#include<stdio.h>
#define MAX_LIMIT 20
void main()
{
   char str[MAX_LIMIT];
   fgets(str, MAX_LIMIT);
   printf("%s", str);
 
   getchar();
   return;
}