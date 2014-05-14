#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main() 
{
    long long int t,n,k,d,val,s;
	cin>>t;
	while(t--)
	{
	    s=0;
	   cin>>n>>d>>k;
	   for(i=0;i<n;i++)
	   {
	       cin>>val;
	       s+=val;
	   }
	   d=d-s;
	   if(d>=k)cout<<"Yes"<<endl;
	   else cout<<"No"<<endl;
	   
	}
	return 0;
}
