/*
Author Name::Himanshu Tomar (A lousy COd3r)
Lang::C++
*/
 
#include <bits/stdc++.h>
 
// definitions
 
#define pii pair<int,int>
#define piii pair<int,pii>
#define mp(a,b) make_pair(a,b)
#define pf(a) push_front(a)
#define pb(a) push_back(a)
#define ppf() pop_front()
#define ppb() pop_back()
#define ll long long int
#define ull unsigned long long
#define s(a) scanf("%d",&a)
#define ss(a,b) scanf("%d%d",&a,&b)
#define sl(a) scanf("%lld",&a)
#define clr(x) memset(x,0,sizeof(x))
#define FOR(x,y,z) for(int x=y;x<z;x++)
#define RFOR(x,y,z) for(int x=y;y>=z;x--)
#define bs(a,b,c) binary_search(a,b,c)
#define ub(a,b,c) upper_bound(a,b,c)
#define lb(a,b,c) lower_bound(a,b,c)
const int INF = (int)1e9;
const int NINF = -(int)1e9;
const int MOD = (int)1e9 + 7;
const double PI=acos(-1.0);
const double EPS=1e-11;
 
 
using namespace std;
 
/*
int dx[]={1,0,0,-1};
int dy[]={0,1,-1,0};
 
 
 
int dx[]={1,0,0,-1,1,1,-1,-1};
int dy[]={0,-1,1,0,1,-1,1,-1};
*/
 
template<class T>
T gcd(T a, T b) { while(b) b ^= a ^= b ^= a %= b; return a; }
 
template<class T>
T lcd(T a,T b) { return abs(a*b)/gcd(a,b); }
 
/*
void seive(int N)
{
    memset(prime,1,sizeof(prime));
    prime[0]=prime[1]=false;
     
    for(int i = 4; i < N; i+= 2) prime[i]=false;
     
    for(int i = 3; i*i < N;i+= 2)
    if(prime[i])
        for(int j = i*i; j < N; j+= (i<<1))
            prime[j]=false;
}
*/
 
/*
template<class T>
T pow(T x,T n)
{
    if(n==0) return 1;
    T r=1,y=x;
    while(n>1)
    {
        if(r>=l) { flag=true; break; }
        if(n&1) { r*=y;  }
        y*=y; 
        n/=2;
    }
    r*=y; 
    return r;
}
*/
 
vector<int> v[1000000];
bool visited[1000000];

int bfs(int src){
    cout<<"src is"<<src<<endl;
    int cnt=1; visited[src]=1;
    queue<int> q;
    q.push(src);
    while(!q.empty()){
        int start=q.front();
        q.pop();
        for(int i=0;i<v[start].size();i++){
            if(!visited[v[start][i]]) { q.push(v[start][i]); visited[v[start][i]]=1; cnt++; }
        }
    }
    return cnt; 
}  

int main()
{
    //clock_t startTime = clock();
    int n,m; cin>>n>>m;
    for(int i=0;i<1000000;i++) { v[i].clear(); visited[i]=0; }
    for(int i=0;i<m;i++){
        int a,b; cin>>a>>b;
        v[a].pb(b); v[b].pb(a);
    }
    int ans=0;
    for(int i=1;i<=n;i++){
        int cnt;
        for(int i=1;i<=n;i++) {
            if(!visited[i]){
        if(!visited[i]) cnt=bfs(i);
        int j=1; while(j*j>cnt) j++;
        cout<<" cnt is "<<cnt<<endl;
        ans+=j;
            }
    }
    cout<<ans<<endl;
    //cout << " Execution time is :: "<<double( clock() - startTime ) / (double)CLOCKS_PER_SEC<< " seconds." << endl;
    return 0;
} 