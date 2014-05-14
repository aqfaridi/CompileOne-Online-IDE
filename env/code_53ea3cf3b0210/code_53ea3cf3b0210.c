#include <stdio.h>

int main(void) {
int a=1;
printf("%d %d %d",++a,a,a++);// outputs: 3 3 1

a=1;
printf("%d %d %d",a++,a,a++);// outputs: 2 3 1

a=1;
printf("%d %d %d",a,a,a++);// outputs: 2 2 1

a=1;
printf("%d %d %d",a,a++,a);// outputs: 2 1 2

a=1;    
printf("%d %d %d",a,a,++a);// outputs: 2 2 2
	return 0;
}

