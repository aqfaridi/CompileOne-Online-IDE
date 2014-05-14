#include <iostream>
#include<stdlib.h>
using namespace std;
int main() {
int t,i,c,n,flag=0,lag=0,a[1005],m;
cin>>t;
while(t--){
flag=0;lag=0;
cin>>n;
for(i=0;i<=n;i++)
a[i]=0;
for(i=0;i<n;i++){
cin>>m;
if(m==n-1 && a[0]==0)
a[0]=1;
else if(a[m]==0 && m<n)
a[m]=1;
else if(a[m]==1 && a[n-1-m]==0)
a[n-1-m]=1;
}
for(i=0;i<n;i++){
if(a[i]==0)
{lag++;
break;}
}
if(lag>0)
cout<<"NO"<<endl;
else
cout<<"YES"<<endl;}
	return 0;
}
