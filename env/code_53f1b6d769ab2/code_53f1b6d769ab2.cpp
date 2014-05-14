#include <iostream>
using namespace std;
bool comp(pair<int,string>p1,pair<int,string>p1)
{
    return p1.first>p2.first;
}
int main() {
	
	vector<pair<int,string> > a;
	a.clear();
	cin>>n;
	for(i=0;i<n;i++)
	{
	    cin>>name>>val;
	    a.pb(mp(val,name));
	}
	sort(a.begin(),a.end(),comp);
	for(i=0;i<a.size;i++)
	{
	    cout<<a[i].first<<"  "<<a[i].second<<endl;
	}
	return 0;
}
