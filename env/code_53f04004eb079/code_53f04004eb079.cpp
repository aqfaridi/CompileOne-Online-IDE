#include <iostream>
#include<bits/stdc++.h>

using namespace std;

int main() 
{
	int n,m,i,j,ans;
	char c;
	while(cin>>n>>m>>c)
	{
		
		char a[105][105];
		int col[257];
		for(i=0;i<=256;i++)col[i]=0;
		for(i=0;i<=n+1;i++)
		{
			for(j=0;j<=m+1;j++)
			{
				a[i][j]='.';
			}
		}
		//cout<<col[48]<<endl;
		for(i=1;i<=n;i++)
		{	
			for(j=1;j<=m;j++)
			{
				cin>>a[i][j];
			}
		}
		ans=0;
		for(i=0;i<=n+1;i++)
		{	
			for(j=0;j<=m+1;j++)
			{
				cout<<a[i][j]<<" ";
			}
			cout<<endl;
		}
		
		for(i=1;i<=n;i++)
		{
			for(j=1;j<=m;j++)
			{
				if(a[i][j]==c)
				{
					col[a[i][j]]=1;
					if(a[i+1][j]!='.' && col[a[i+1][j]]==0 && a[i+1][j]!=c)
					{
						//cout<<"1"<<endl;
						ans++;
						col[a[i+1][j]]=1;
					}
					if(a[i-1][j]!='.' && col[a[i-1][j]]==0 && a[i+1][j]!=c)
					{
						//cout<<"2"<<endl;
						ans++;
						col[a[i-1][j]]=1;
					}
					if(a[i][j-1]!='.' && col[a[i][j-1]]==0 && a[i+1][j]!=c)
					{
						//cout<<"3"<<endl;
						ans++;
						col[a[i][j-1]]=1;
					}
					if(a[i][j+1]!='.' && col[a[i][j+1]]==0 && a[i+1][j]!=c)
					{
						//cout<<"4"<<endl;
						ans++;
						col[a[i][j+1]]=1;
					}
				}
			}
		}
		cout<<ans<<endl;
	}
	return 0;
}