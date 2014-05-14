#include<iostream>
#include<string>
using namespace std;
int main() {
	// your code goes here
	int T;
	int O[25];
	int q,w;
	int k=0;
	int i=0;
	int j=0;
	int count =0;
	string I, F;
	string A, B;
	std::cin>>T;
	for(k=0; k<T; k++)
	{
	O[k]=0;
	count =0;
	i=0, j=0, q=0, w=0;
	I = "";
	F = "";
	std::cin >> I >> F;
		for(i=0; I[i]!='\0'; i++)
	{ if(I[i]!='_')
	    {A[j]=I[i]; j++;}
	  else q=i;
	}
	A[j]='\0';
	
	j=0;
	for(i=0; F[i]!='\0'; i++)
	{ if(F[i]!='_')
	    {B[j]=F[i]; j++;}
	  else w=i;
	}
    B[j]='\0';
	 
	if(strcmp(A,B)==0)
	{
	    if(q<w)
	    {
	        O[k]=w-q;
	    }
	    else if(q>w)
	    {
	        O[k]=q-w;
	    }
	}
	else
	{
	    for(i=0;A[i]!='\0';i++)
	             if(A[i]!=B[i]) count++;
	    if(q<w)
	    {
	        O[k]= w-q-(count/2);
	    }
	    else if(q>w)
	    {
	        O[k]= q-w-(count/2);
	    }
	}
	}
	for (i=1; i<=k; i++)
	std::cout<< O[k]<<endl;
	return 0;
}
