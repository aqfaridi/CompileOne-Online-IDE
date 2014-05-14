#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main() 
{
    long long int t,n;
	cin>>t;
	while(t--)
	{
	    cin>>n;
	    if(n%6==1)
	        cout<<"1"<<endl;
	    else if(n%6==3)
	        cout<<"2"<<endl;
	   else if(n%6==0)
	    cout<<"3"<<endl;
	    
	    
	}
	return 0;
}
