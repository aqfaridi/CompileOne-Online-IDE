#include<iostream>
using namespace std;
int main(void){
	 int N,i,sum=0,temp=0;	
	 cin>>N;
	 unsigned int *a;
	 a=(unsigned int*)new int(N);
	 for(i=0;i<N;i++){
	 	cin>>a[i];
	 }	
	 for(i=0;i<N-1;i++){
		for(int j=i+1;j<N;j++){
			temp=a[i]&a[j];
			if(temp>sum){
				sum=temp;
			}
			
		}
	 }
	 cout<<temp;
return 0;
}