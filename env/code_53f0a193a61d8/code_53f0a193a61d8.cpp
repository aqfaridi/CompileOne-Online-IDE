#include<iostream>
#include<stdio.h>
using namespace std;
int main()
{
    int n;
      // freopen("testcase.txt","r+",stdin);
       //   freopen("output.txt","w+",stdout);
    cin>>n;
    cout<<n<<endl;
    while(n>1)
    {
              int x;
              cin>>x;
              cout<<x<<" ";
              n--;
    }
    int x;
    cin>>x;
    cout<<x;
     return 0;
}
