#include <cstring>
#include<algorithm>
#include<iostream>
using namespace std;
 
unsigned long long  a[100006];
int main()
{
    unsigned long long n,i,j,x;
    unsigned long long ans=0;
    cin>>n;
    for(int i=0;i<n;i++){
        cin>>j;
        a[j]++;
    }
   // 
    if(a[100000]>a[99999]){
        ans=ans+(100000)*a[100000];
        a[100000]=0;
        a[99999]=0;
    }    
    for(i=99999;i>1;i--){
        
        if((i*a[i])>=(((i+1)*a[i+1])+((i-1)*a[i-1]))){
            ans=ans+i*a[i];
            a[i]=0;
            a[i+1]=0;
            a[i-1]=0;
            //if(i==4) cout<<"sss";
        }
        else{ ans=ans+ (i+1)*a[i+1];
              
        
            }
        //if(i<6){ for(int j=1;j<=4;j++) cout<<j*a[j];
          //      cout<<endl;}
    }
    if(a[1]>=a[2]) ans+=a[1];
    else ans+=2*a[2];
    cout<<ans<<endl;
    return 0;
} 