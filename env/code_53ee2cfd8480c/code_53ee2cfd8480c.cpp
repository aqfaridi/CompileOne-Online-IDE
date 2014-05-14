#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main() {
    long long int i,n,max,first,last;
	while(cin>>n)
	{
		int a[n+1];	
	for(i=0;i<n;i++)
	{
		cin>>a[i];
	}
	sort(a,a+n);
	max=a[n-1]-a[0];
	first=0;
	last=0;
	for(i=0;i<n;i++)
	{
		if(a[i]==a[0])
		{
			first++;
		}
		else if(a[i]==a[n-1])
		{last++;}
	}
	cout<<max<<" "<<first*last<<endl;
	}
	return 0;
}