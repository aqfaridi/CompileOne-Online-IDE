#include <iostream>
#include <limits.h>
#include <stdio.h>
#include <algorithm>
#include <vector>
#include <cstring>
#include <math.h>
#include <map>
#include <queue>
#include <stack>
#include <bitset>
using namespace std;

#define ll long long int
#define ld long double
#define form(i,m) for(i=m.begin();i!=m.end();i++)
#define all(v) (v).begin(), (v).end()
#define pb push_back
#define mp make_pair
#define X it->first
#define Y it->second
#define mod 1000000009

const int INF = (int)1e9;
const ld EPS = 1e-9;
const ld PI = 3.1415926535897932384626433832795;


int main() {
    ios_base::sync_with_stdio(false);
	int t=1;
	cin>>t;
	while(t--)
	{
		int n;
		cin>>n;
		int a[11][101]={0};
		ll b[11][101][101]={0};
		vector<int > c[11];
		getchar();
		char s[1001];
		//string s;
		for(int i=0; i<n; i++)
        {
            //gets(s[i]);
            getline(cin,s);
            int l=strlen(s);
            for(int j=0; j<l; j++)
            {
                int x=0;
                for(; j<l; j++)
                {
                    if(s[j]==' ')
                        break;
                    x=(x*10)+(s[j]-'0');
                }
                cout<<x<<" ";
                c[i].pb(x);
            }
        }
		
		for(int i=0;i<n;i++)
		{
			for(int j=0;j<(int)c[i].size();j++)
			{
				a[i][c[i][j]]=1;
			}
		}
		
		
		
		b[0][0][0]=(ll)c[0].size();
		for(int i=1;i<=100;i++)
			b[0][i][0]=b[0][0][0];
		for(int i=0;i<(int)c[0].size();i++)
			b[0][c[0][i]][0]--;
			
		for(int i=1;i<=100;i++)
		{
			for(int j=1;j<=100;j++)
			{
				if(j!=i and a[0][j]==1)
					b[0][i][j]=1;
			}
		}
		ll ans=0;
		for(int i=1;i<n-1;i++)
		{
			ans=0;
			for(int j=0;j<(int)c[i].size();j++)
			{
				ans=(ans+b[i-1][c[i][j]][0])%mod;
			}
			b[i][0][0]=ans;
			for(int j=1;j<=100;j++)
			{
				ans=0;
				for(int k=0;k<(int)c[i].size();k++)
				{
					if(c[i][k]!=j)
					{
						ans=(ans + b[i-1][ c[i][k] ][0] - b[i-1][ c[i][k] ][j])%mod;
                        b[i][j][ c[i][k] ]+= (b[i-1][ c[i][k] ][0] - b[i-1][ c[i][k] ][j]);
                        
                        for(int m=1;m<=100;m++)
                        {
							if(m!=c[i][k] and m!=j)
								b[i][j][m]+=b[i-1][c[i][k]][m];
						}
					}
				}
				b[i][j][0]=ans;
			}
		}
		
		if(n>1)
		{
			ans=0;
			for(int i=0;i<(int)c[n-1].size();i++)
			{
				ans=(ans+b[n-2][c[n-1][i]][0])%mod;
			}
		}
		else
		{
			ans=b[0][0][0]%mod;
		}
		
		cout<<ans%mod<<endl;
	}
	return 0;
}