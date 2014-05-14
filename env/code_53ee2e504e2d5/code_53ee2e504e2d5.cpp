#include<iostream>
using namespace std;

int main()
{
int t;
cin>>t;
long long int a;
while(t--)
{
cin>>a;
int res=0;
while(a>0)
{
if(a==2)
{ res+=2         ;
break;
}

if(a%2==0)
a/=2;
else
a = (a/2)+1;
res++;
}
cout<<res<<endl;
}
return 0;
}