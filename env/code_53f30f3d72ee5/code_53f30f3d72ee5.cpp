#include <iostream>
#include<bits/stdc++.h>
#define ll long long int
using namespace std;

ll binary(ll *s,ll t,ll n)
{
    ll low,high,mid;
    low=0;
    high=n-1;
    while(low<=high)
    {
        mid=low+(high-low)/2;
        if(s[mid]==t)
            return mid;
        else if(s[mid]>t && t<s[mid-1])
            return mid-1;
        else if(s[mid]>t)
            high=mid-1;
        else if(s[mid]<t)
            low=mid+1;
       
    }
}
int main() 
{
	
	ll n,tot,i;
	    cin>>n>>tot;
	    ll a[n],s[n];
        for(i=0;i<n;i++)
            cin>>a[i];
        sort(a,a+n);
        s[0]=a[0];
        for(i=1;i<n;i++)
        {
            s[i]=s[i-1]+a[i];
        }
        for(i=0;i<n;i++)
        {
            cout<<s[i]<<endl;
        }
        cout<<binary(s,tot,n)<<endl;
        
	
	
	return 0;
}
