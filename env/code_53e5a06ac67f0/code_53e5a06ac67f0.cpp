#include<cstdio>
#include<cstring>
#include<algorithm>
using namespace std;
int main()
    {
    int arr[26],i,t; char brr[105];
    scanf("%d",&t);
    while(t--)
    {
        gets(brr);
        for(i=0;i<strlen(brr);i++)
        arr[brr[i]-97]++;
    }
    return 0;
}