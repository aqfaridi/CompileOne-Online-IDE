
/*
Author Name::Himanshu Tomar
Lang::C++
*/

#include<iostream>
#include<cstdio>
#include<sstream>
#include<cstdlib>
#include<cassert>
#include<utility>
#include<vector>
#include<algorithm>
#include<queue>
#include<stack>
#include<iomanip>
#include<map>
#include<deque>
#include<set>
#include<ctime>
#include<cstring>
#include<cmath>

// definitions

#define pii pair<int,int>
#define mp(a,b) make_pair(a,b)
#define pf(a) push_front(a)
#define pb(a) push_back(a)
#define ppf() pop_front()
#define ppb() pop_back()
#define ll long long int
#define ull unsigned long long
#define s(a) scanf("%d",&a)
#define ss(a,b) scanf("%d%d",&a,&b)
#define sl(a) scanf("%lld",&a)
#define clr(x) memset(x,0,sizeof(x))
#define FOR(x,y,z) for(int x=y;x<z;x++)
#define RFOR(x,y,z) for(int x=y;y>=z;x--)
#define bs(a,b,c) binary_search(a,b,c)
#define ub(a,b,c) upper_bound(a,b,c)
#define lb(a,b,c) lower_bound(a,b,c)
const int INF = (int)1e9;
const int NINF = -(int)1e9;
const int mod = (int)1e9 + 7;
const double PI=acos(-1.0);
const double EPS=1e-11;


using namespace std;

/*
int dx[]={1,0,0,-1};
int dy[]={0,1,-1,0};
*/

/*
int dx[]={1,0,0,-1,1,1,-1,-1};
int dy[]={0,-1,1,0,1,-1,1,-1};
*/

template<class T>
T gcd(T a, T b) { while(b) b ^= a ^= b ^= a %= b; return a; }

template<class T>
T lcd(T a,T b) { return abs(a*b)/gcd(a,b); }

/*
void seive(int N)
{
    memset(prime,1,szeof(prime));
    prime[0]=prime[1]=false;

    for(int i = 4; i < N; i+= 2) prime[i]=false;

    for(int i = 3; i*i < N;i+= 2)
    if(prime[i])
        for(int j = i*i; j < N; j+= (i<<1))
            prime[j]=false;
}
*/

/*
template<class T>
T pow(T x,T n)
{
    if(n==0) return 1;
    T r=1,y=x;
    while(n>1)
    {
        if(n&1) { r*=y; r%=mod; }
        y*=y; y%=mod;
        n/=2;
    }
    r*=y; r%=mod;
    return r;
}
*/

int main(){
	int n; cin>>n; int cnt=1;
	for(int i=0;i<n/2;i++){
		int star=n-cnt;
		for(int j=0;j<star/2;j++) printf("*");
		for(int j=0;j<cnt;j++) printf("D");
		for(int j=0;j<star/2;j++) printf("*");
		cnt+=2; printf("\n"); 
	}
	for(int i=0;i<n/2+1;i++){
		int star=n-cnt;
		for(int j=0;j<star/2;j++) printf("*");
		for(int j=0;j<cnt;j++) printf("D");
		for(int j=0;j<star/2;j++) printf("*");
		cnt-=2; printf("\n"); 
	}
	return 0;
}