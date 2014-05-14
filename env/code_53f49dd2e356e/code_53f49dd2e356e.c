#include <stdio.h>

int main(void) {
	// your code goes here
	int a=0,b=0,c=0;
	printf("enter two values:");
	scanf("%d%d"&a,&b);
	getch();
	c = a + b;
	printf("the sum of two values is :%d",c);
	getch();
	return 0;
}

