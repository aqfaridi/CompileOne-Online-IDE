#include <iostream>
#include<bits/stdc++.h>
#define ll long long int
using namespace std;

int main() 
{
	ll n,m,s;
	while(cin>>n>>m)
	{
	    s=n+(n/m);
	    if(s%m==0)s=s+1;
		cout<<s<<endl;
	}
	return 0;
}