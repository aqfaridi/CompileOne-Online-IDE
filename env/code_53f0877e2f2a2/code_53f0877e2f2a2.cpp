#include <bits/stdc++.h>
#define MAX 1000000009
using namespace std;

int main() 
{
	int t,n,i;
	long long a[MAX],res;

	cin>>t;
	while(t--)
	{

		cin>>n;

		for(i=0;i<n;i++)
		{
			cin>>a[i];
		}
        res=(n*(n-1))/2;
        cout<<res<<endl;
	}
	return 0;
} 

