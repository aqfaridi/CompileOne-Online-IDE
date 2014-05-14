#include <bits/stdc++.h>
using namespace std;

map<string,int> mymap;
vector<string> v;
map<string,bool> dp;

bool wrap(string str){
	if(dp[str]) return 1;
	if(str.length()==0) return 1;
	string temp="";
	for(int i=0;i<str.length();i++){
		temp+=str[i]; string var=str.substr(i+1,str.length()-i);
		//cout<<"temp is "<<temp<<endl;
		if(mymap[temp]==1){
			dp.insert(make_pair(temp,1));
			bool tcs=wrap(var);
			//cout<<"tcs is "<<tcs<<endl;
			if(tcs) { dp.insert(make_pair(var,1)); v.push_back(temp); return 1; }
		}
	}
	return 0;
}


int main(){
	
	int n;
	scanf("%d",&n);
	for(int i=0;i<n;i++){
		string a; cin>>a;
		mymap.insert(make_pair(a,1));
	}
	getchar();
	string q; getline(cin,q);
	wrap(q); reverse(v.begin(),v.end());
	for(int i=0;i<v.size();i++) cout<<v[i]<<" ";
	cout<<endl;
return 0;
}
