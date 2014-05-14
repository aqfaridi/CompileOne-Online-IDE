#include <stdio.h>

int main(void) {
	// your code goes here
	int a,b,c;
	printf("enter two values:");
	scanf("%d%d",&a,&b);
	getch();
	c = a + b;
	printf("the sum of two values is :%d",c);
	getch();
	return 0;
}

