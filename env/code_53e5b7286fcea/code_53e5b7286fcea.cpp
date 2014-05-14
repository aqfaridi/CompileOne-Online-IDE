#include<cstdio>
#include<cstring>
#include<algorithm>
#include<set>
using namespace std;
int main()
    {
    int arr[105][26],j,t,c=0; char brr[105];
    scanf("%d",&t);
    for(j=0;j<t;j++)
    {
        scanf("%s",brr);
        for(i=0;i<strlen(brr);i++)
        arr[j][brr[i]-97]++;
    }
    for(i=0;i<26;i++)
    {
        for(j=0;j<t;j++)
        {
            if(arr[j][i]==0)
            break;
        }
        if(j==t-1)
        c++;
    }
    return 0;
    }