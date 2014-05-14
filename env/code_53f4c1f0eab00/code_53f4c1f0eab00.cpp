#include <iostream>
#include<bits/stdc++.h>
#define ll long long int
using namespace std;

int main() 
{
	ll n,m,s;
	while(cin>>n>>m)
	{
		s=n;
		while(n!=0)
		{
			s=s+(n/m);
			n=n/m;
		}
		cout<<s<<endl;
	}
	return 0;
}