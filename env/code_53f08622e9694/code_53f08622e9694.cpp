#include<stdio.h>
#include<iostream>
#include<math.h>
using namespace std;
 
int main()
{
int n,t,i,a[1200];
int m=0;
scanf("%d",&t);
while(t--){
n=t;
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
 
if(temp>pent){
a[m]=t;
cout<<a[m]<<",";
m++;
}
}
return 0;
}