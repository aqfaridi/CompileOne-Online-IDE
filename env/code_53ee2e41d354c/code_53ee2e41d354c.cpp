#include<iostream>
#include<stdio.h>
#include<algorithm>
using namespace std;
int main()
{
   // while(1)
    {
    int n;
    cin>>n;
    int num[2*100000+4];
    for(int i=0;i<n;i++)
    cin>>num[i];
    sort(num,num+n);
    
    int sum1=1,sum2=1;
    
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
    cout<<"0 "<<(n*(n-1))/2<<endl;
}
     return 0;
}
