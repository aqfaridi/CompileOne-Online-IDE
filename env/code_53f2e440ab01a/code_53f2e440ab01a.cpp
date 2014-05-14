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

ll binary(ll *a,ll c,ll n)
{
    ll low , high ,i,pos,req,min,mid;
    low=0,high=a[n-1];
    min=0;
    while(low<=high)
    {
        mid=low+(high - low)/2;
        req=1;
        pos=a[0];
        for(i=1;i<n;i++)
        {
            if(a[i]-pos<=mid)
            {
                pos=a[i];
                req++;
            }
        }
        if(req<c)
        {
            high=mid-1;
        }
        else
        {
            low=mid+1;
            if(min<mid)
            min=mid;
        }
    }
    return min;
}
int main()
{
    ll t,n,c;
    cin>>t;
    while(t--)
    {
        cin>>n>>c;
        ll a[n];
        rep(i,n)
        {
            cin>>a[i];
        }
        sort(a,a+n);
        cout<<binary(a,c,n)<<endl;
    }
}