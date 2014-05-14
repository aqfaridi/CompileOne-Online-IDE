#include <iostream>
#include<bits/stdc++.h>
#define pb push_back
#define mp make_pair
using namespace std;

bool comp(pair<int,string>p1,pair<int,string>p2)
{
    if(p1.first<p2.first)
        return true;
}
int main() 
{
    int n,i,m;
    string name,no;
    vector<pair<int,string> >taxi;
    vector<pair<int,string> >pizza;
    vector<pair<int,string> >call;
	cin>>n;
	taxi.clear();
	pizza.clear();
	call.clear();
	while(n--)
	{
	    cin>>m>>name;
	    int ta=0,pi=0,girl=0;
	    for(i=0;i<m;i++)
	    {
	        cin>>no;
	        if((no[0]==no[1])&&(no[1]==no[3])&&(no[3]==no[4])&&(no[4]==no[6])&&(no[6]==no[7]))
	        {
	            ta++;
	        }
	        else if((no[0]==(no[1]+1))&&(no[1]==(no[3]+1))&&(no[3]==(no[4]+1))&&(no[4]==(no[6]+1))&&(no[6]==(no[7]+1)))
	        {
	            pi++;
	        }
	        else
	        {
	            girl++;
	        }
	    }
	    taxi.pb(mp(ta,name));
	    pizza.pb(mp(pi,name));
	    call.pb(mp(girl,name));
	    
	}
	sort(taxi.begin(),taxi.end(),comp);
	sort(pizza.begin(),pizza.end(),comp);
	sort(call.begin(),call.end(),comp);
	for(i=0;i<taxi.size();i++)
	{
	    cout<<taxi[i].first<<"  "<<taxi[i].second<<endl;
	}
	cout<<"If you want to call a taxi, you should call: ";
	cout<<taxi[0].second;
	for(int i=1;i<taxi.size();i++)
	{
	    if(taxi[i-1].second==taxi[i].second)
	    {
	        cout<<", ";
	        cout<<taxi[i].second;
	    }
	    else
	    {
	        cout<<"."<<endl;
	        break;
	    }
	}
	cout<<"If you want to order a pizza, you should call: ";
	cout<<pizza[0].second;
	for(int i=1;i<pizza.size();i++)
	{
	    if(pizza[i-1].second==pizza[i].second)
	    {
	        cout<<", ";
	        cout<<pizza[i].second;
	    }
	    else
	    {
	        cout<<"."<<endl;
	        break;
	    }
	}
	cout<<"If you want to go to a cafe with a wonderful girl, you should call: ";
	cout<<call[0].second;
	for(int i=1;i<call.size();i++)
	{
	    if(call[i-1].second==call[i].second)
	    {
	        cout<<", ";
	        cout<<call[i].second;
	    }
	    else
	    {
	        cout<<"."<<endl;
	        break;
	    }
	}
	
	return 0;
}
