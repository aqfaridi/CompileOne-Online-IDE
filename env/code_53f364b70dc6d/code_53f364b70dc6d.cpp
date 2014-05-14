#include<iostream>
using namespace std;
int main()
{	
	int T,N,i,count=0,j=0;
	long int A;
	cin>>T;
	int result[T];
	long int tot[T];
	for(i=0;i<T&&T<=100&&T>=1;i++){
		cin>>N;
		tot[i]=1;
		for(j=0;j<N&&N<=10&&N>=1;j++){
			cin>>A;
			tot[i]*=A;
		}
		count=0;
		for(j=1;j<=tot[i];j++){
			if(tot[i]%j==0){
				++count;
			}
		}
		cout<<count<<endl;
	}
    return 0;
} 