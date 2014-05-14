/*
Template belongs to : Himanshu Jaju [himanshujaju]
*/

#include<bits/stdc++.h>
using namespace std;

typedef long long int LL;

#define inp_s     ios_base::sync_with_stdio(false);
#define VI        vector<int>
#define VS        vector<string>
#define VLL       vector<LL>
#define PII       pair<int,int>
#define all(c)    c.begin(),c.end()
#define sz(c)     c.size()
#define clr(c)    c.clear()
#define msi       map<string,int>
#define msit      map<string,int>::iterator
#define pb        push_back
#define mp        make_pair
#define FOR(i,a,b) for(int i=a;i<b;i++)

#define ADD 1234567890
#define MOD 2147483648

int arr[2000001] = {0};
vector<int> primes;
int limit = 2000000;
void sieve()
{
      for(int i=2;i<=limit;i++) arr[i] = 1;
      int i=2;
      while(i<=limit)
      {
            primes.pb(i);
            int j = 2;
            while(1LL*i*j<=limit)
            {
                  arr[i*j] = 0;
                  j++;
            }
            i++;
            while(i<=limit && !arr[i]) i++;
      }
}

int is_prime(LL x)
{
      if(x<=limit) return arr[x];
      if(x%2 == 0 || x%3 == 0 || x%5 == 0 || x%7 == 0 || x%11 == 0 || x%13 == 0 || x%17==0 || x%19==0 || x%23 == 0 || x%29 == 0 || x%31 == 0)
      return 0;
      for(int i=11;i<sz(primes) && (primes[i]*primes[i]*1LL)<=x;i++)
      {
            if(x%primes[i] == 0)
                  return 0;
      }
      return 1;
}

int main()
{
        //inp_s;
      sieve();
      LL a = 1;
      printf("0");
      int cnt = 0;
      while(cnt<=1000000)
      {
            a = (a+ADD)%MOD;
            printf("%d",is_prime(a));
            cnt++;
      }
      //cout<<ans<<endl;
      return 0;
}



