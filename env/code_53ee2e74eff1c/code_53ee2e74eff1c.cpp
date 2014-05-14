#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main() {
    long long int i,n,max,first,last,ans;
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
	if(a[0]!=a[n-1])
	{
	for(i=0;i<n;i++)
	{
		if(a[i]==a[0])
		{
			first++;
		}
		else if(a[i]==a[n-1])
		    last++;

    	}
    	ans=(first*last);
	}
	else
	{
	  for(i=0;i<n;i++)
	{
		if(a[i]==a[0] && a[0]!=a[n-1])
		{
			first++;
		}
	}
	ans=(first*(first-1))/2;
	}
	cout<<first<<" "<<last<<endl;
	cout<<max<<" "<<ans<<endl;
	}
	return 0;
}