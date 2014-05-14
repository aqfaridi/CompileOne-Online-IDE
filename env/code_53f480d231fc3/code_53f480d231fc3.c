#include<stdio.h>
void main()
{
	int i,j,n,m,temp;
	float a[20][20],b[20][20];
	clrscr();
	printf("\n enter the no. of rows:");
	scanf("%d",&m);
	printf("\n enter the no. of cols:");
	scanf("%d",&n);
	printf("\n enter the elements of matrix %d X %d",m,n);
	for(i=0;i<m;i++)
	{
		printf("\n enter %d row",i);
		for(j=0;j<n;j++)
		{
			scanf("%f",&a[i][j]);
		}
	}
	printf("the matrix is:");
	for(i=0;i<m;i++)
	{
		printf("\n");
		for(j=0;j<n;j++)
		{
			printf("\t %f",a[i][j]);
		}
	}
	printf("\n enter the elements of identity matrix %d X %d",m,n);
	for(i=0;i<m;i++)
	{
		printf("\n enter %d row",i);
		for(j=0;j<n;j++)
		{
			scanf("%f",&b[i][j]);
		}
	}
	printf("the matrix is:");
	for(i=0;i<m;i++)
	{
		printf("\n");
		for(j=0;j<n;j++)
		{
			printf("\t %f",b[i][j]);
		}
	}

	if (a[0][0]==0)
        {
        for(i=0;i<m;i++)
            {
                temp=a[0][i];
                a[0][i]=a[1][i];
                a[1][i]=temp;
         
                temp=b[0][i];
                b[0][i]=b[1][i];
                b[1][i]=temp;
            }
        }
 
    temp = a[0][0];
     
    for(i=0;i<m;i++)
    {
        for(j=0;j<n;j++)
        {
            a[i][j]/=temp;
            b[i][j]/=temp;
        }
    }
 
    for (i=1;i<m;i++)
    {
	temp = a[i][0];
        for(j=0;j<n;j++)
        {
            a[i][j]-=a[0][j]*temp;
            b[i][j]-=b[0][j]*temp;
        }
    }
 
             
         
    for (i=0; i<m; i++)
    {
        printf ("\n");
        for (j=0; j<n; j++)
        {
            printf("%f ", a[i][j]);
        }
    }
         
    for (i=0; i<m; i++)
    {
        printf ("\n");
        for (j=0; j<n; j++)
        {
            printf("%f ", b[i][j]);
        }
    }
    return 0;
}
