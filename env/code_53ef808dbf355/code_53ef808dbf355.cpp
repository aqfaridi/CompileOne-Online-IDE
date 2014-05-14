#include <iostream>
#include<bits/stdc++.h>
using namespace std;
long long int a[1000005];
long long int primes[10000];
void prime()
{
    long long int i,p,j,k;
    for(i=2;i<1000001;i++)a[i]=1;
    for(j=4;j<1000001;j+=2)a[i]=0;
    for(j=3;j<1000001;j+=2)
    {
        if(a[j])
        {
            for(p=2;(j*p)<1000001;p++)
            {
                a[p*j]=0;
            }
        }
    }
    k=0;
    for(i=0;i<1000001;i++)
    {
        if(a[i])
        primes[k++]=i;
    }
}
int main() 
{
    long long int t,n,i;
    cin>>t;
    prime();
    while(t--)
    {
        cin>>n;
        for(i=0;i<n;i++)
        {
            cout<<primes[i]<<" ";
        }
        cout<<endl;
    }
	return 0;
}
