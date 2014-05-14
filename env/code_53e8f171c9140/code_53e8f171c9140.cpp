#include<iostream>
#include<vector>
#include<set>
#define MAX 1000000000
using namespace std;
vector<vector<pair<int,int> > > graph;
set<pair<int,int> > h;
int dist[100002],visited[100002];
void dijkstra(int src)
{
	int i;
	for(i=0;i<100002;i++)
	{
		dist[i]=MAX;visited[i]=0;
	}
	dist[src]=0;
	set<pair<int,int> >::iterator a,temp;
	vector<pair<int,int> >::iterator b;
	h.insert(make_pair(0,src));
	while(!h.empty())
	{
		a=h.begin();
		pair<int,int> foo=*a;
		int vertex=foo.second;
		visited[vertex]=1;
		h.erase(h.begin());
		for(b=graph[vertex].begin();b!=graph[vertex].end();b++)
		{
			int adj=b->first;
			int adj_weight=b->second;
			int old_dist=dist[adj],new_dist=dist[vertex]+adj_weight;
			if(new_dist<old_dist&&!visited[adj])
			{
				pair<int,int> to_find=make_pair(old_dist,adj);
				temp=h.find(to_find);
				if(temp!=h.end())
					h.erase(temp);
				h.insert(make_pair(new_dist,adj));
				dist[adj]=new_dist;
			}
 
		}
	}
 
}
int main()
{
	int n,m,x,y,weight,src,i;
	cin>>n>>m;
	graph.resize(n+100002);
	for(i=0;i<m;i++)
	{
		cin>>x>>y;
		graph[x].push_back(make_pair(y,0));
		graph[y].push_back(make_pair(x,1));
	}
	//cin>>src;
	dijkstra(1);
	//for(i=0;i<n;i++)
	if(dist[n]==MAX)
        cout<<-1;
    else
		cout<<dist[n];
	cout<<endl;
}