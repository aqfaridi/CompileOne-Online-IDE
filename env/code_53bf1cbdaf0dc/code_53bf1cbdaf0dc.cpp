#include <iostream>
#include <algorithm>
using namespace std;

int main() {
	long long int n,p,k,a,b;
	cin>>n>>p>>k;
	long long int arr[n+6], arr2[n+6];
	for(int i=0;i<n;i++)
	cin>>arr[i];
	sort(arr,arr+n);
	int cnt=0;
	for(int i=1;i<n;i++)
	{
	    if((arr[i] -arr[i-1]) <= k)
	    {
	        cnt++;
	        arr2[i-1] = cnt;
	    }
	    else
	    arr2[i-1] = 0;
	}
		for(int i=0;i<n;i++)
	    cout<<arr2[i]<<"  ";
	while(p--)
	{
	    cin>>a>>b;
	    if((arr2[b-1] - arr2[a-1]) == (b-a))
	        cout<<"Yes\n";
	    else
	        cout<<"No\n";
	}
	return 0;
}
