#include< cstdio>
#include< iostream>
using namespace std;
int main()
{
int t,n,i,ans,avg;
int arr[10001];
scanf("%d",&t);
while(t!=-1)
{
ans=0;
for(i=0;i< t;i++)
{
scanf("%d",&arr[i]);
ans+=arr[i];
 
}
if(ans%t!=0)
printf("-1\n");
else
{
avg=int(ans/t);
n=0;
for(i=0;i< t;i++)
{
if(arr[i]>avg)
n+=(arr[i]-avg);
}
printf("%d\n",n);
}
scanf("%d",&t);
}
return 0;
}
