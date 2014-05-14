#include<stdio.h>
//#include<algorithm>
using namespace std;
int main()
{
    int a;
    int arr[10005];
    scanf("%d",&a);
    while(a!=-1)
    {
        int k,temp=0,temp1=0,i;
        for(i=0;i<a;i++)
        {
            scanf("%d",&arr[i]);
            temp+=arr[i];
        }
        sort(arr,arr+a);
        k=temp/a;
        if(temp%a!=0){
            printf("-1\n");
        }
        else
        {
            for(i=0;i<a;i++)
            {
                while(arr[i]>k)
                {
                    arr[i]--;
                    temp1++;
                }
            }
            printf("%d\n",temp1);
        }
        scanf("%d",&a);
    }
    return 0;
}

