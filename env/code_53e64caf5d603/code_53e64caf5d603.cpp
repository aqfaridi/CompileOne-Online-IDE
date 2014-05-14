#include<iostream>
#include<vector>
using namespace std;
void compute(char *ch,int start,int index,vector<int,int> &a)
{
	if(ch[start]=='.') return;
	a[index>=0?index:-1*index+1000].push_back(ch[start]);
	if(ch[start+1]=='(')  compute(ch,start+2,index-1,a);
	if(ch[start+4]==')') return;
}
int main()
{
	int t;
	cin>>t;
	while(t--){
		int n,t;
		vector<int,int> a;
		for(int i=0;i<2002;i++)  a.push_back(vector<int> ());
		char ch[1001];
		cin>>n >> ch;
		compute(ch,0,a);
	}
	return 0;
}
