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

typedef struct{
      int a;
      LL b;
      int c;
      int d;
      int e;
      int f;
} hj;

bool cmp(const hj &x, const hj &y)
{
      if(x.a > y.a) return false;
      if(x.b > y.b) return false;
      if(x.c > y.c) return false;
      if(x.d > y.d) return false;
      if(x.e > y.e) return false;
      if(x.f > y.f) return false;
      return true;
}

void PRINT(hj h,int cnt)
{
      printf("%02d %08d %04d %04d %04d %04d %d\n",h.a,h.b,h.c,h.d,h.e,h.f,cnt);
      return ;
}

int same(hj a, hj b)
{
      if(a.a == b.a && a.b == b.b && a.c == b.c && a.d == b.d && a.e == b.e && a.f == b.f) return 1;
      return 0;
}

int main()
{
      inp_s;
      int t;
      cin>>t;
      while(t--)
      {
            vector<hj> acc;
            int n;
            cin>>n;
            for(int i=0;i<n;i++)
            {
                  hj p;
                  cin>>p.a>>p.b>>p.c>>p.d>>p.e>>p.f;
                  acc.pb(p);
            }
            sort(all(acc),cmp);
            FOR(i,0,sz(acc))
            {
                  int cnt = 1,j = i+1;
                  while(j<sz(acc) && same(acc[i],acc[j]))
                  {
                        cnt++;
                        j++;
                  }
                  i = j-1;
                  PRINT(acc[i],cnt);
            }
            cout<<endl;
      }
      return 0;
}
