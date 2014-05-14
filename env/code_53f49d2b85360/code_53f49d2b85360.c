#include <stdio.h>

int main(void) {
	// your code goes here
	char *a;
	int count=0,i,temp;
	scanf("%s",a);
	for(i=0;a!='\0';i++)
	{
	    a=a+i;
	    temp=a;
	    if(*temp=='1')
	    {
	        while(*(temp+1)=='0')
	        {
	            temp++;
	        }
	        if(*temp=='1')
	        count++;
	    }
	    
	}
	return 0;
}
