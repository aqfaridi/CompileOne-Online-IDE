#include <stdio.h>
 
int main()
{
    int t,n,k,d;
    scanf("%d",&t);
    while(t--) {
        scanf("%d%d%d",&n,&k,&d);
        int a[n],i;
        long long int s=0;
        for(i = 0; i < n; i++) { 
            scanf("%d",&a[i]);
            s += a[i];
        }
        if(s+d <= k)
        puts("Yes");
        else
        puts("No");
    }
    return 0;
}