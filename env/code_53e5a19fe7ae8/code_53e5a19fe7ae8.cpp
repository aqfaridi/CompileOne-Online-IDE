#include<cstdio>
#include<cstring>
#include<algorithm>
using namespace std;
int main()
    {
    int arr[26],i,j,t; char brr[105];
    scanf("%d",&t);
    for(j=1;j<=t;j++)
    {
        gets(brr);
        for(i=0;i<strlen(brr);i++)
        if(arr[brr[i]-97]<j)
        arr[brr[i]-97]++;
    }
    return 0;
}