#include<stdio.h>
int main()
{
  char arr[] = "geeks"; // size of arr[] is 6 as it is '\0' terminated
  printf("%d", sizeof(arr));
  getchar();
  return 0;
}