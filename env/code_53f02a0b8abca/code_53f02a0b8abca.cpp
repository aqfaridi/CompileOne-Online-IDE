#include <iostream>
#include <vector>
#define pb push_back
using namespace std;
long long mod=1000000007;
vector<long long> fibo,power;
void two_pow()
{
    long long p;
    power.pb(1);
    for(int i=1;i<100;i++)
    {
        power.pb(power[i-1]+power[i-1]);
        if(power[i]>=mod)
            power[i]-=mod;
    }
}
void fib() 
{
	long long o=1,n=1;
	fibo.pb(1);
	while(1)
	{
		n=n+o;
		o=n-o;
		fibo.pb(n);
		if(n>1e18)
		    break;
	}
}
int main() 
{
	long long n,inp,cnt,x,ans=0;
	int sol[100];
	fib();
	two_pow();
	for(int i=0;i<100;i++)
	    sol[i]=0;
	cin>>n;
	for(int i=0;i<n;i++)
	{
		cin>>inp;
		for(int i=0;i<fibo.size();i++)
		{
			if(fibo[i]>n)
			{
				cnt=i-1;
				break;
			}
		}
		for(int i=cnt;i>=0;i--)
		{
			if(n>=fibo[i])
			{
				x=1;
				n-=fibo[i];
			}
			else
				x=0;
			cout<<x;
			sum[i]^=x;
		}
		cout<<endl;
	}
	
	for(int i=0;i<100;i++)
	{
	    cout<<sol[i];
	    if(sol[i])
	        ans+=power[i];
	    if(ans>=mod)
	        ans-=mod;
	}
	cout<<ans<<endl;
	return 0;
} 