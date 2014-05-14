#include <stdio.h>
#include<iostream>
using namespace std;
int main()
{
   char arr[] = {10, 20, 30, 40, 50, 60};
   char *ptr = arr;
    
   // sizof(int) * (number of element in arr[]) is printed
   printf("Size of arr[] %d\n", sizeof(arr));
 
   // sizeof a pointer is printed which is same for all type 
   // of pointers (char *, void *, etc)
   printf("Size of ptr %d\n", sizeof(ptr));
   cout<<arr[]<<endl;
   cout<<*ptr;
   return 0;
}