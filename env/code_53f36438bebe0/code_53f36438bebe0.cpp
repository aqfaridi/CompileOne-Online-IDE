#include <iostream>
using namespace std;
int main()
{
  int i,min1,min2;
  long int T,N,sum;
 /* 	cout<<"enter test cases :";					*/
  	cin>>T;
  	while(T--){
	/*	cout<<"enter the size of array :";			*/
		cin>>N;
		if(N<2)
			continue;
		long int a[N];
	/*	cout<<"enter the element of array :";		*/
		for(i=0;i<N;i++){
		cin>>a[i];
		}
		min1=a[0];
		min2=a[1];
		for(i=0;i<N;i++){
			if(min1>a[i]){
				min2=min1;
				min1=a[i];
			}
			if(min2>a[i]&&min1!=a[i]){
				min2=a[i];
			}
		}
	/*	cout<<min1<<"  "<<min2<<endl;		*/
		sum=min1+min2;
		cout<<sum;		
  	  }

   return 0;
}