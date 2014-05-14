    #include <iostream>
    #include<cmath>
    using namespace std;
    int main()
    {
    int t;
    cin>>t;
    while(t--)
    {
    long int x,y;
    cin>>x>>y;
    bool flag=true;
    if(x==0 and flag and abs(y)%2==0)
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
				if(flag and abs(y)<=x-1)
				{
					cout<<"YES\n";
					flag=false;
				}
				if(flag and abs(y)>x and abs(y)%2==0)
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
				if(flag and y>=x+2 and abs(y)%2==0)
					{
					cout<<"YES\n";
					flag=false;
					}
				}
				if(y<0)
				{
					if(flag and abs(y)>=x and abs(y)%2==0)
					{
					cout<<"YES\n";
					flag=false;
					}
				}
			}
    }
    if(flag and x<0)
    {
		if((abs(x)&1) and flag)
		{
		if(abs(y)>abs(x) and abs(y)%2==0)
			{
			cout<<"YES\n";
			flag=false;
			}
		}
		if(!(abs(x)&1) and flag)
		{
		if(abs(y)<=abs(x) and flag)
			{
			cout<<"YES\n";
			flag=false;
			}
		if(abs(y)>abs(x) and abs(y)%2==0 and flag)
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