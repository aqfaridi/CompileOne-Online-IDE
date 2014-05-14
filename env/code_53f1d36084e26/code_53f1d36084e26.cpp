#include <iostream>
#include <cstdio>
#include <algorithm>
#include <cstring>
#include <sstream>
#include <vector>
#include <iomanip>
#include <cmath>
#include <set>
#include <map>
#include <queue>
#include <climits>
#include <cassert>
#include <numeric>
using namespace std;
typedef long long ll;
typedef pair<int,int> pii;

#define pb push_back
#define mp make_pair
#define sz size()
#define ln length()
#define forr(i,a,b) for(int i=a;i<b;i++)
#define rep(i,n) forr(i,0,n)
#define all(v) v.begin(),v.end()
#define uniq(v) sort(all(v));v.erase(unique(all(v)),v.end())
#define clr(a) memset(a,0,sizeof a)

#define debug if(1)
#define debugoff if(0)

#define print(x) cerr << x << " ";
#define pn() cerr << endl;
#define trace1(x) cerr << #x << ": " << x << endl;
#define trace2(x, y) cerr << #x << ": " << x << " | " << #y << ": " << y << endl;
#define trace3(x, y, z) cerr << #x << ": " << x << " | " << #y << ": " << y << " | " << #z << ": " << z << endl;

#define MAX 1000010
#define MOD 1000000007
 bool prime(ll n)
 {
     ll i;
     bool p=false;
     for(i=2;i*i<=n;i++)
     {
         if(n%i==0)
         {
             p=true;
             break;
         }
     }
     return p;
 }
 int main()
 {
     ll p,q,n;
     cin>>n;
    
     if(n==1 || prime(n))
     {
         cout<<1<<endl;
         cout<<"0"<<endl;
     }
     else
     {
         p=sqrt(n);
         if(p*p==n)
         {
             if(prime(p))
             {
                 cout<<"2"<<endl;
             }
             else
             {
                 cout<<"1"<<endl;
                 cout<<p<<endl;
             }
         }
         else
         {
             q=n/p;
             if(prime(p)&&prime(q))
             {
                cout<<"2"<<endl; 
             }
             else if(prime(p))
             {
                 cout<<"1"<<endl;
                 cout<<q<<endl;
             }
            else if(prime(q))
             {
                 cout<<"1"<<endl;
                 cout<<p<<endl;
             }
             else
             {
                 cout<<"1"<<endl;
                 cout<<p<<endl;
             }
         }
     }
     return 0;
 }
 