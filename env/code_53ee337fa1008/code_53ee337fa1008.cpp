#include<iostream>
#include<stdio.h>
#include<algorithm>
using namespace std;
    int num[2*100000+4];
int main()
{
   // while(1)
 //  freopen("testcase.txt","r+",stdin);
  // freopen("output.txt","w+",stdout);
    {
    long long int n;
    cin>>n;

    for(int i=0;i<n;i++)
    cin>>num[i];
    sort(num,num+n);
    
    long long sum1=1,sum2=1;
    
    for(int i=1;i<n;i++)
    {
            if(num[i]==num[i-1])
            sum1++;
            else 
            break;
    }
    for(int i=n-2;i>=0;i--)
    {
            if(num[i]==num[i+1])
            sum2++;
            else break;
    }
    if(num[n-1]!=num[0])
    cout<<num[n-1]-num[0]<<" "<<sum1*sum2<<endl;
    else
    {
        n=n*(n-1);
     cout<<"0 "<<n/2<<endl;
     }
    //system("PAUSE");
}
     return 0;
}
