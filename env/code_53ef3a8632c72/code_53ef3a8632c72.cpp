#include <stdio.h>
#include <stdlib.h>
#include<iostream>
using namespace std;

#define limit 1000 /*size of integers array*/

int main(){
    int i,j,n;
    int tc;
    scanf("%d",&tc);
    while(tc--)
    {
    cin>>n;
    int flag=0;
    int primes[limit];
    int z = 1;

    cout<<"here";

    for (i=2;i<limit;i++)
        primes[i]=1;

    for (i=2;i<limit;i++)
        if (primes[i])
            for (j=i;i*j<limit;j++)
                primes[i*j]=0;
    cout<<"here";


    int count=n;

    for (i=2;flag==0;i++)
        if (primes[i])
            count++;
            printf("%d ",i);
            if(count==n)flag=1;
    }
return 0;
}
