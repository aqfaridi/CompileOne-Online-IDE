#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main() 
{
    int t,n,f;
	cin>>t;
	while(t--)
	{
	    cin>>n;
	    f=1;
	    while(n!=0)
	    {
	        if(f==1)
	        {
	            n=n-1;
	            if(n==0)
	            {
	                cout<<"1"<<endl;
	                break;
	            }
	            else
	            {
	                f=2;
	            }
	        }
	        else if(f==2)
	        {
	             n=n-2;
	            if(n==0)
	            {
	                cout<<"2"<<endl;
	                break;
	            }
	            else
	            {
	                f=3;
	            }
	        }
	         else if(f==3)
	        {
	             n=n-3;
	            if(n==0)
	            {
	                cout<<"3"<<endl;
	                break;
	            }
	            else
	            {
	                f=1;
	            }
	        }
	    }
	}
	return 0;
}
