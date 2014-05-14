/*
Author Name::Himanshu Tomar (A lousy COd3r)
Lang::C++
*/
 
#include <map>
#include <set>
#include <queue>
#include <stack>
#include <ctime>
#include <cmath>
#include <deque>
#include <cstdio>
#include <vector>
#include <string>
#include <iomanip>
#include <cstring>
#include <sstream>
#include <cstdlib>
#include <cassert>
#include <utility>
#include <iostream>
#include <algorithm>

 
// definitions
 
#define pii pair<int,int>
#define piii pair<int,pii>
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
const int MOD = (int)1e9 + 7;
const double PI=acos(-1.0);
const double EPS=1e-11;
 
 
using namespace std;
 


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
    memset(prime,1,sizeof(prime));
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
        if(r>=l) { flag=true; break; }
        if(n&1) { r*=y;  }
        y*=y; 
        n/=2;
    }
    r*=y; 
    return r;
}
*/

int main(){
    int x1,y1,x2,y2; 
    cin>>x1>>y1>>x2>>y2; bool flag=0;
    double dist=(double)sqrt( (x2-x1)*(x2-x1) + (y2-y1)*(y2-y1) );
    if(dist-(int)dist>0.00) flag=1;
    double len;
    if(flag) len=(double)((double)dist/(double)sqrt(2));
    else len=(int)dist;
    int length=(int)len;
    if(abs(x2-x1)!=abs(y2-y1) and flag) { cout<<"-1\n"; return 0; }
    else{
        if(flag) {
            if(x1<x2 and y1<y2){
                cout<<x1+length<<" "<<y1<<" ";
                cout<<x1<<" "<<y1+length<<endl;
            }
            else if(x2>x1 and y1>y2){
                cout<<x1+length<<" "<<y1<<" ";
                cout<<x1<<" "<<y1-length<<endl;
            }
            else if(x1>x2 and y1>y2){
                cout<<x2+length<<" "<<y1<<" ";
                cout<<x2<<" "<<y2+length<<endl; 
            }
            else{
                cout<<x2+length<<" "<<y2<<" ";
                cout<<x2<<" "<<y2-length<<endl;
            }
        }
        else{
            if(x1<x2){ 
                cout<<x1<<" "<<y1+length<<" ";
                cout<<x2<<" "<<y2+length<<endl;
            }
            else if(x2<x1){
                cout<<x2<<" "<<y2+length<<" ";
                cout<<x1<<" "<<y1+length<<endl;
            }
             if(y1<y2){ 
                cout<<x1+length<<" "<<y1<<" ";
                cout<<x2+length<<" "<<y2<<endl;
            }
            else if(y2<y1){
                cout<<x2+length<<" "<<y2<<" ";
                cout<<x1+length<<" "<<y1<<endl;
            }
        }
    }
    return 0;
}