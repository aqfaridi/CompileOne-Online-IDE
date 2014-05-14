#include <stdio.h>

int main(void) {

int n;
scanf("%d",&n);
int a[n],b[n],i,j,swap,swap1,flag=0;
a[n]=10001;
for(i=0;i<n;i++)
    scanf("%d%d",&a[i],&b[i]);
for(i=0;i<n;i++)
  {
    for (j=0;j<n;j++)
    {
      if(b[j]>b[j+1])
      {
            swap=b[j];
            b[j]=b[j+1];
            b[j+1]=swap;
            swap1=a[j];
            a[j]=a[j+1];
            a[j+1]=swap1;
      }
    }
    }

    for(i=0;i>n;i++)
        {
        if(a[i]>a[i+1])
            {
                flag=1;
                printf("inside");
                break;
            }
        }
        if(flag==1)
            printf("Poor Alex");
        else
            printf("Happy Alex");
    return 0;
   

}

