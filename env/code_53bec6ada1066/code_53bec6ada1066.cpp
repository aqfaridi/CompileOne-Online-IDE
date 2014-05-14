#include <iostream>
//#include<conio.h>
using namespace std;

int main() 
{

int n,x;
int t=-1,count=0,k=n,a[20000][20000];
cin>>n>>x;
for(int i=0;i<n;i++)
{
	for(int j=0;j<3;j++)
	{
		cin>>a[i][j];
	}
}
while(count!=1 && k!=0)
{
	int j=0;int b[n],c[n];
for(int i=0;i<n && a[i][0]!=-1 && a[i][0]!=t;i++)
{
	if(x>=a[i][1])
	{
		b[j]=i;
		j++;
	}
	else
	count++;
}
for(int i=0;i<j;i++)
{
	c[i]=a[b[i]][2];
}
int index=0,max=c[0];
for(int i=0;i<j-1;i++)
{
	if(max<c[i+1])
	{
		index=i+1;
		max=c[i+1];
	}
}
x=x+a[b[index]][2];
a[b[index]][0]=-1;
t=b[index];
k--;
	}
	cout<<x<<endl;
//	getch();
	return 0;
}