#include<iostream>
#include<algorithm>
using namespace std;
int perform();
int main(){
    int t,i=0,z;
    cin>>t;
    z=t;
    int r[t];
    while(t>0){
       r[i]=perform();
    i++;
    t--;
    }
    for(i=0;i<z;i++)
        cout<<r[i]<<"\n";
return 0;
}
int perform(){
 int n,m,i,count=1;
cin>>n>>m;
int mrr[m];
for(i=0;i<m;i++)
    cin>>mrr[i];
if(m==1 || n==1)
    return m;
else {
sort(mrr,mrr+m);
for(i=0;i<(m -1);i++)
    if(mrr[i]==mrr[i+1])
       continue;
    else
       count++;
return count;
}
}
