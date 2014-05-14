/*
Template belongs to : Himanshu Jaju [himanshujaju]
*/

#include<bits/stdc++.h>
using namespace std;

typedef long long int LL;

#define inp_s ios_base::sync_with_stdio(false);

#define VI vector<int>
#define VS vector<string>
#define VLL vector<LL>
#define PII pair<int,int>

#define all(c) c.begin(),c.end()
#define sz(c) c.size()
#define clr(c) c.clear()

#define msi  map<string,int>
#define msit map<string,int>::iterator

#define pb push_back
#define mp make_pair

#define FOR(i,a,b) for(int i=a;i<b;i++)

int main()
{
      inp_s;
      int n;
      cin>>n;
      LL a[n],b[n],c[n],d[n];
      for(int i=0;i<n;i++)
            cin>>a[i]>>b[i]>>c[i]>>d[i];
      map<LL,int> pos,neg;
      for(int i=0;i<n;i++)
            for(int j=0;j<n;j++)
            {
                  LL x = -(a[i]+b[j]);
                  if(x<0) neg[x]++;
                  else pos[x]++;
            }
      LL ans = 0;
      FOR(i,0,n)
            FOR(j,0,n)
            {
                  LL q = c[i]+d[j];
                  if(q<0) ans += neg[q];
                  else ans+=pos[q];
            }
      cout<<ans<<endl;
      return 0;
}

