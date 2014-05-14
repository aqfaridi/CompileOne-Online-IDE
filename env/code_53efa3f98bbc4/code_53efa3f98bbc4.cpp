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
s[1][149]="1";
s[0][149]="1";
for(int i=2;i<101;i++)
{
	//s[i]=s[i-1];
cout<<s[i]<<endl;
	for(int j=1;j<i;j++)
	{
		cary=0;res=0;
		for(int k=149;s[i][k]!='a';k++)
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
		
		if(k==s[i-1].length())
		{
		s[i][k]=cary;
		}
	}
	
}
	
}
	cout<<s[1];

	return 0;
}