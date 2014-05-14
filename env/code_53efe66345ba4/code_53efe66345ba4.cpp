#include <iostream>
#include <cstring>
using namespace std;

int main() {
char s[150][101];

int cary,res=0,k;
for(int i=0;i<101;i++)
{
    for(int j=0;j<150;j++)
    {
        s[i][j]='a';
    }
    
}
s[1][149]='1';
s[0][149]='1';
for(int i=2;i<101;i++)
{
	for(int j=0;j<i;j++)
	{
		cary=0;res=0;
		
		for( k=149;k>0;k--)
		{
		    if(j==1)
		    {
		        for(int l=0;l<149;l++)
		        {
		            if(s[i-1][l]!='a')
		            {
		                s[i][l]=s[i-1][l];
		                cout<<s[i][l];
		            }
		        }
		    }
		    if(s[i][k]!='a'&&j!=0)
		    {
		    res=0;
		    //cout<<"kkk"<<"  "<<res<<endl;
		res=int(s[i][k])+int(s[i-1][k])+cary;
		if(res>9)
		{
		cary=1;
		s[i][k]=res-10;
		}
		else
		{
		cary=0;
		s[i][k]=res;
		}
		    }
		    if(s[i][k]=='a')
		    {
		        s[i][k]=cary;
		        break;
		    }
	
	}
	
}
	
}
for(int i=0;i<101;i++)
{
	 for(int l=0;l<149;l++)
		        {
		            if(s[i][l]!='a')
		            {
		               
		                cout<<s[i][l];
		            }
		        }
}

	return 0;
}