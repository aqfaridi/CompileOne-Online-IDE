#include <stdio.h>

void main(void)
{
 {
int a[ ] = {10,20,30,40,50},j,*p;
for(j=0; j<5; j++)
{
printf(“%d” ,*a);
a++;
}
p = a;
for(j=0; j<5; j++)
{
printf(“%d ” ,*p);
p++;
}
}
