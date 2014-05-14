#include <iostream>
#include<algorithm>
#include<vector>
using namespace std;

int main() {
	int n,i,j,sum=0,k;
           scanf("%d", &n);
while(n!=0){
sum=0;
int a[n];
for(i=0;i<n;i++){
        scanf("%d", &a[i]);
}
sort(a,a+n);
for(i=(n-1);i>1;--i){
int j=0;k=i-1;
while(j<k){
while(j<k && a[j]+a[k]>=a[i])
k--;
sum+=k-j;
++j;}}
        printf("%d\n", sum);
        scanf("%d", &n);}
	return 0;
}

