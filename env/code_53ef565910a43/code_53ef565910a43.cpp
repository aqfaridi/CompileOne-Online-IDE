#include<bits/stdc++.h>
using namespace std;

int main(){
int n;
cin>>n;
map<int,int>m;
int ar[n+3];
for(int i=0;i<n;i++){cin>>ar[i];m[ar[i]]++;}
if(m.size()>1)
cout<<(m.end-1)->first-(m.begin)->first<<" "<<(m.end-1)->second*(m.begin)->second;
else
cout<<(m.end-1)->first-(m.begin)->first<<" "<<((m.end-1)->second*((m.begin)->second-1))/2;

return 0;    
}