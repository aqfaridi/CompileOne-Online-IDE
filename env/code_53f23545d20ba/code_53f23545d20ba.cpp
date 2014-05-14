#include <iostream>
#include <cstdio>
#include <algorithm>
#include <cstring>
#include <sstream>
#include <vector>
#include <iomanip>
#include <cmath> 

using namespace std;
typedef long long LL;
typedef pair<int,int> pii;

#define MAX 100010
#define MOD 1000000007    
int main()
{
    ios::sync_with_stdio(false);
    int t,n,k,x,d;
    cin>>t;
    cin>>n>>k>>x;
    int ans[1002];
    for(int j=0;j<t;j++)
    {
    	LL ans1=0;
    int arr[n+1];
    for(int i=0;i<n;i++)
    {
      cin>>arr[i];
      ans1+=arr[i]*x;
    }
    //sort(arr,arr+n);
    //cout<<arr[0]<<" "<<arr[n-1]<<endl;

    ans[j]=ans1;
    }
    cin>>d;
    for(int i=0;i<t;i++)
    {
    	if(ans[i]+d<=k)
    	cout<<"Yes\n";
   		else
   			cout<<"No\n";
    }
    
    return 0;
}


