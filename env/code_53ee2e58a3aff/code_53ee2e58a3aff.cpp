#include <cstdio>
#include <iostream>
#include <vector>
#include <algorithm>
#include <cstring>
#include <cmath>
#include <set>
#include <map>

using namespace std;

typedef vector<int> vi;
typedef vector<vi> vvi;
typedef pair<int,int> ii; 
#define sz(a) int((a).size()) 
#define pb push_back 
#define all(c) (c).begin(),(c).end() 
#define tr(c,i) for(typeof((c).begin() i = (c).begin(); i != (c).end(); i++) 
#define present(c,x) ((c).find(x) != (c).end()) 
#define cpresent(c,x) (find(all(c),x) != (c).end()) 


int main()
{
    int t,max,min,a[200005],maxn,minn,n,i;
    cin>>n;
    max=maxn=minn=0;min=1000000005;
    for(i=0;i<n;i++)
    {
    	cin>>a[i];
    	if(a[i]>max)
    		max=a[i];
    	if(a[i]<min)
    		min=a[i];
    }
    for(i=0;i<n;i++){
    if(a[i]==max)
    maxn++;
    if(a[i]==min)
    minn++;
    }
    cout<<maxn*minn;
    return 0;
}