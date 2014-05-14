#include<stdio.h>
 
int main()
{
  int a = 10, b = 20;
  (a, b) = 30; // Since b is l-value, this statement is valid in C++, but not in C.
  printf("b = %d", b);
  printf("\na = %d", a);
  getchar();
  return 0;
}