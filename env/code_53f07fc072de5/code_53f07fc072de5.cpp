#include<iostream>

using namespace std;
int main(void){
	long int N;
	cout<<"enter the array size :";
	cin>>N;
	long int A[N],sum=0;
	cout<<"enter "<<N<<" numbers :";
	for(int i=0;i<N;i++)
		cin>>A[i];
	for(int i=N-1;i>=0;i--){
		for(int j=i-1;j>=0;j--){
			sum+=(A[i]&A[j]);
		}
	}
	cout<<"\nsum= "<<sum;
return 0;
}