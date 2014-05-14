#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        unsigned long long n;
        scanf("%llu",&n);
        unsigned long long ans;
        ans=(n*(n+2)*(2*n+1)/8);
        printf("%llu\n",ans);
    }
    return 0;
}

