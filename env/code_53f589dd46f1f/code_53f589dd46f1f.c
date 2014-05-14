#include<stdio.h>
void main()
{
volatile int i=5;
printf("%d%d%d%d%d",i++,i--,++i,--i,i);
}
