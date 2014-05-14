/*
Author Name::Himanshu Tomar (A lousy COd3r)
Lang::C++
*/
 
#include <map>
#include <set>
#include <queue>
#include <stack>
#include <ctime>
#include <cmath>
#include <deque>
#include <cstdio>
#include <vector>
#include <string>
#include <iomanip>
#include <cstring>
#include <sstream>
#include <cstdlib>
#include <cassert>
#include <utility>
#include <iostream>
#include <algorithm>

 
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
 

int dx[]={1,0,0,-1};
int dy[]={0,1,-1,0};
 
 
/* 
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
        //if(r>=l) { flag=true; break; }
        if(n&1) { r*=y;  }
        y*=y; 
        n/=2;
    }
    r*=y; 
    return r;
}
*/

char str[100][101];
bool visited[100][100];
bool done[100][100];
int dist[100][100];
int alpha=0,n,m,result=0;
pii start;

class Orienteering {
    public:
        void main();
};

bool check(int a,int b){
    return (a>=0 and a<n and b>=0 and b<m);
}

void bfs(pii start){
    //cout<<start.first<<" "<<start.second<<endl;
    //cout<<"result is "<<result<<endl;
    clr(dist); clr(visited); bool flag=0;
    visited[start.first][start.second]=1;
    queue<pii> q; q.push(start);
    while(!q.empty()){
        pii top=q.front(); q.pop();
        for(int i=0;i<4;i++){
            int a,b; a=top.first+dx[i]; b=top.second+dy[i];
            if(check(a,b)) dist[a][b]=dist[top.first][top.second]+1;
            if( check(a,b) and str[a][b]=='G' and alpha==0) { result+=dist[a][b]; flag=1; break; }
            else if( check(a,b) and str[a][b]=='@' and !done[a][b] and !visited[a][b]) { 
                done[a][b]=1; result+=dist[a][b]; alpha--; bfs(make_pair(a,b)); 
            }
            else if(check(a,b) and str[a][b]!='#' and !visited[a][b]){
                visited[a][b]=1; q.push(make_pair(a,b));
            }
        }
        if(flag) break;
    }
     cout<<"flag is fuck "<<flag<<" result is "<<result<<endl;
    return;
}

int main(int argc,char *argv[])
{
    //clock_t startTime = clock();
    ss(m,n); 
    for(int i=0;i<n;i++){
        for(int j=0;j<m;j++){
            cin>>str[i][j]; 
            if(str[i][j]=='@') alpha++;
            else if(str[i][j]=='S') { start.first=i; start.second=j; }
        }
    }
    /*for(int i=0;i<n;i++){
        for(int j=0;j<m;j++) cout<<str[i][j]<<" ";
            cout<<endl;
    }*/
    bfs(start);
    printf("%d\n",result);
    //cout << " Execution time is :: "<<double( clock() - startTime ) / (double)CLOCKS_PER_SEC<< " seconds." << endl;
    return 0;
} 