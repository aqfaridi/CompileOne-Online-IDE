#include <iostream>
#include <cstring>
using namespace std;

int main() {
char s[150][101];

int cary,res=0;
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
	for(int j=1;j<i;j++)
	{
		cary=0;res=0;
		for(int k=149;k>0;k--)
		{
		    if(s[i][k]!='a'&&k==149)
		    {
		    res=0;
		    cout<<"kkk"<<"  "<<res<<endl;
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
	
	}
	
}
	
}
	cout<<s[2][1500];

	return 0;
}