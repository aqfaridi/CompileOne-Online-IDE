/* C basic structure program   Documentation section 
   Author: fresh2refresh.com        
   Date    : 01/01/2012 
*/
#include <stdio.h>          /* Link section */
int total = 0;   /* Global declaration and definition section */
int sum (int, int);        /* Function declaration section */
int main ()                 /* Main function */
{       
     printf ("This is a C basic program \n");
     total = sum (1, 1);                               
     printf ("Sum of two numbers : %d \n", total);
     return 0;
}
int sum (int a, int b)     /* User defined function */
{                           /* definition section    */     
     return a + b;             
}