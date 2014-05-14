#include<iostream>
using namespace std;
int main()
{
       int t;
       cin>>t;
       int n,k,d,sum,x;
       while(t--)
       {
               sum=0;
               cin>>n>>k>>d;
               for(int i=0;i<n;i++)
               {
                       cin>>x;
                       sum=sum+x;
               }
               sum=sum+d;
                if(sum<=k)
                       cout<<"Yes"<<endl;
               else
                       cout<<"No"<<endl;
       }
       return 0;
}