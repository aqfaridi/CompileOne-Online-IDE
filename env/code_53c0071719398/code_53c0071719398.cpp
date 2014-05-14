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
	arr2[0]=0;
	for(int i=1;i<n;i++)
	{
	    if((arr[i] -arr[i-1]) <= k)
	    {
	        cnt++;
	        arr2[i] = cnt;
	    }
	    else
	    arr2[i] = 0;
	}
	for(int i=0;i<n;i++)
	cout<<arr2[i]<<" ";
	cout<<"\n";
	while(p--)
	{
	    cin>>a>>b;
	    cout<<arr2[b]<<" "<<arr2[a]<<endl;
	    if((arr2[b-1] - arr2[a]) == (b-a))
	        cout<<"Yes\n";
	    else
	        cout<<"No\n";
	}
	return 0;
}
