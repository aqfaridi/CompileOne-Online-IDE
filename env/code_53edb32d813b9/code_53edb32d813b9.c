#include<stdio.h>
int main(void)
{
	int n,i;
	scanf("%d",&n);
	int answer=1;
	for(i=1;i<=n;i++)
	{
		answer=(answer+(i*i*i*i));
	}
	printf("%d\n",answer);
	return 0;
}