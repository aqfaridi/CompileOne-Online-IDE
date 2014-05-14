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

int bsearch(VI arr,int key)
{
      int top = key;
      int bottom = 1;
      while(top>=bottom)
      {
            if(arr[top] == key) return top;
            if(arr[bottom] == key) return bottom;
            int mid = (top+bottom)/2;
            if(arr[mid] == key) return mid;
            else if(arr[mid]>key) top = mid-1;
            else bottom = mid+1;
      }
      return 0;
}

int main()
{
      VI cubes;
      for(int i=2;i<=100;i++)
            cubes.pb(i*i*i);
      int arr[1000001] = {0};
      for(int i=0;i<sz(cubes);i++)
      {
            int j = 1;
            while(1LL*cubes[i]*j<=1000000)
            {
                  arr[cubes[i]*j] = 1;
                  j++;
            }
      }
      VI pos;
      pos.pb(0);
      int posi = 1;
      for(int i=1;i<=1000000;i++)
            if(!arr[i])
                  pos.pb(posi++);
            else
                pos.pb(0);
      inp_s;
      int t;
      cin>>t;
      FOR(test,1,t+1)
      {
            int n;
            cin>>n;
            cout<<"Case "<<test<<": ";
            if(arr[n]) cout<<"Not Cube Free"<<endl;
            else cout<<pos[n]<<endl;
      }
      return 0;
}
