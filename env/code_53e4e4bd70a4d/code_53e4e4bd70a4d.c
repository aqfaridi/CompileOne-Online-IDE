

#include <stdio.h>
 
int main()
{
   int t,n, reverse, temp;
  scanf("%d",&t);
  while(t--)
  {
  
  
   scanf("%d",&n);
 
   temp = n;
 	reverse=0;
   while( temp > 0 )
   {
      reverse = reverse * 10;
      reverse = reverse + temp%10;
      temp = temp/10;
   }

   if ( n == reverse )
      printf("%d \n", n);
   else
      printf("%d\n", n);
}
   return 0;
}