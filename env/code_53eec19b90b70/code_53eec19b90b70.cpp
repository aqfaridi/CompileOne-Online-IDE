#include <iostream>
#include <cstring>
using namespace std;

int main() {
string s[101];
s[1]="1";
s[0]="1";
int cary,res;
for(int i=2;i<100;i++)
{
	s[i]=s[i-1];
cout<<s[2]<<endl;;
	for(int j=1;j<i;j++)
	{
		cary=0;
		for(int k=0;k<=s[i-1].length();k++)
		{
		    cout<<"kkk"<<endl;
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