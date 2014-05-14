#include <stdio.h>

int main() {
	// your code goes here
	int a,b,c,i,count=0;
	scanf("%d %d",&a,&b);
	c=a^b;
	for(i=0;i<32;i++)
	{
		if(c&(1<<i))
		    count++;
	}
	printf("%d",count);
	return 0;
}
