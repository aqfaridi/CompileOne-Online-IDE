#include <stdio.h>

int main(void) {
	// your code goes here
	
		char a[100];
	int count=0;
	int i,t;
	scanf("%s",a);
	for(i=0;a[i]!='\0';i++)
	{
	    t=i;
	    if((a[t])=='1')
	    {
	        t++;
	        while((a[t])=='0')
	            t++;
	        if((a[t])=='1')
	        count++;
	    }
	}
	printf("%d",count);
	
	return 0;
}
