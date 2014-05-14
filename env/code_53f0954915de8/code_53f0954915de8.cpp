#include<stdio.h>
#include<algorithm>
using namespace std;
int main()
{
    int X;
    int a[10000];
    scanf("%d",&X);
    while(a!=-1)
    {
        int k,temp=0,temp1=0,i;
        for(i=0;i<X;i++)
        {
            scanf("%d",&a[i]);
            temp+=a[i];
        }
        sort(a,a+X);
        k=temp/X;
        if(temp%X!=0){
            printf("-1\n");
        }
        else
        {
            for(i=0;i<X;i++)
            {
                while(a[i]>k)
                {
                    a[i]--;
                    temp1++;
                }
            }
            printf("%d\n",temp1);
        }
        scanf("%d",&X);
    }
    return 0;
}
