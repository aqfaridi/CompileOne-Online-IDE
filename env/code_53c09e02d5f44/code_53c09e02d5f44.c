#include <stdio.h>

int main(void) {
    int a[] = {10,20,30,40,50};
    char *p;
    p = (char *)a;
    
    printf("%d",*((int *)p+4));
	return 0;
}

