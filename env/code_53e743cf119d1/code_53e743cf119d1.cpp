    #include <iostream>
    #include<cmath>
    using namespace std;
    int main()
    {
    int t;
    cin>>t;
    while(t--)
    {
    long long int x,y;
    cin>>x>>y;
    
    long long X=abs(x);
    long long Y=abs(y);
    bool flag=true;
    if(x==0 and flag and Y%2==0)
    {
    cout<<"YES\n";
    flag=false;
    }
    if(flag and x>0)
    {
		if(x&1)
			{

			if(y>=0)
			{
				if(flag and y<=x+1)
				{
					cout<<"YES\n";
					flag=false;
				}
				if(flag and y>x+1 and y%2==0)
				{
					cout<<"YES\n";
					flag=false;
				}
			}
			if(y<0)
			{
				if(flag and Y<=x-1)
				{
					cout<<"YES\n";
					flag=false;
				}
				if(flag and Y>x and Y%2==0)
				{
					cout<<"YES\n";
					flag=false;
				}
			}
		}
			if(!(x&1) and flag)
				{
				//cout<<"x "<<x<<" y "<<y<<" positive and even "<<endl;
				if(y>0)
				{
				if(flag and y>=x+2 and Y%2==0)
					{
					cout<<"YES\n";
					flag=false;
					}
				}
				if(y<0)
				{
					if(flag and Y>=x and Y%2==0)
					{
					cout<<"YES\n";
					flag=false;
					}
				}
			}
    }
    if(flag and x<0)
    {
		if((X&1) and flag)
		{
		if(Y>X and abs(y)%2==0)
			{
			cout<<"YES\n";
			flag=false;
			}
		}
		if(!(X&1) and flag)
		{
		if(Y<=X and flag)
			{
			cout<<"YES\n";
			flag=false;
			}
		if(Y>X and Y%2==0 and flag)
			{
			cout<<"YES\n";
			flag=false;
			}
		}
    }
    if(flag)
    {
    cout<<"NO\n";
    }
    }
    return 0;
    } 