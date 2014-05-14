#include<stdio.h>
#include<math.h>

int main()
{
 int n,t,i;
scanf("%d",&t);
while(t--){
scanf("%d",&n);
int count=0,sum=0,temp=0,pent=0;
if(n%2==0)
{
    while (n%2 == 0){
        n = n/2;
        sum++;
        }
          if(sum%2==0)
            temp++;
            else 
            pent++;
            }
            
           for ( i = 3; i <= sqrt(n) && n>1 ;i++)
    {sum=0;
        while (n%i == 0)
        {
            n = n/i;
            sum++;
            
        }
        if(sum!=0)
         if(sum%2==0)
            temp++;
        else
            pent++;
            }
        
          if (n > 2)
          pent++;
             
           if(temp>pent)
           printf("Psycho Number\n");
           else 
           printf("Ordinary Number\n");}
           return 0;
}


