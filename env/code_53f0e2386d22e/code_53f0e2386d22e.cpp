#include <stdio.h>
#include <iostream>
#include <vector>
#include <string>
#include <math.h>
#include <algorithm>
#include <bitset>
#include <set>
#include <sstream>
#include <stdlib.h>
#include <map>
#include <queue>


using namespace std;


#define sz(x) ((int)x.size())
#define all(x) (x).begin(), (x).end()
#define pb(x) push_back(x)
#define mp(x, y) make_pair(x, y)



typedef long long int64;

typedef vector <int> vi;
typedef vector < vi > vvi;

const int INF = 1e9; 

int eggDrop(int n,int k)
{
    int a[n+1][k+1],i,j,x,res;
    for(i=1;i<=n;i++)
    {
        a[i][0]=0;
        a[i][1]=1;
    }
    
    for(j=1;j<=k;j++)
    {
        a[1][j]=j;   
    }
    for(i=2;i<=n;i++)
    {
        for(j=2;j<=k;j++)
        {
            a[i][j]=INF;
            for(x=1;x<=j;x++)
            {
                res=1+max(a[i-1][x-1],a[i][j-x]);
                if(res<a[i][j])
                {
                    a[i][j]=res;
                }
            }
        }
    }
    return a[n][k];
}
int main()
{
    int t,n,k;
    cin>>t;
    while(t--)
    {
        cin>>n>>k;
        cout<<eggDrop(k,n)<<endl;
    }
}