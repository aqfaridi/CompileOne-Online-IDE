#include<stdio.h>
int main()
{
    int a1,a2,a3;
    scanf("%d%d%d",&a1,&a2,&a3);
    while(a1||a2||a3)
    {
        if(a2-a1==a3-a2)
        {
            printf("arithmatic progression %d\n",a3+(a3-a2));
        }
        else
        {
            printf("geometric progression %d\n",a3*(a3/a2));
        }
        scanf("%d%d%d",&a1,&a2,&a3);
    }
    return 0;
}

