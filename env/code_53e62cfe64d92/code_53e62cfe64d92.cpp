#include <iostream>
using namespace std;

struct node{
    int a, b;
}ar[100005];



int main() {
	int n,flag=0,i;
	cin>>n;
	
	for(i=0;i<n;i++)
	cin>>ar[i].a>>ar[i].b;
	sort(ar,ar+n);
	
	for(i=0;i<n-1;i++){
	    
	    if(ar[i].a<ar[i+1].a && ar[i].b>ar[i+1].b)
	    flag=1;
	}
	if(flag)
	cout<<"Happy Alex";
	else
	cout<<"Poor Alex";
}
