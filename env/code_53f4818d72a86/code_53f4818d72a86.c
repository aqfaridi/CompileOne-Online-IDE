#include <stdio.h>

int main() {
	// your code goes here
	int a,b,c,i,count=0;
	scanf("%d %d",&a,&b);
	c=a^b;
	for(i=0;i<10;i++)
	{
		if(c&1)
		count++;
		c>>1;
	}
	printf("%d",count);
	return 0;
}
