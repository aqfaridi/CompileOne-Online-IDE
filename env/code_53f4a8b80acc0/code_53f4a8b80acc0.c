#include <stdio.h>

int main(void) {
	// your code goes here
	
		char ch[100];
	char *a=ch;
	char *temp;
	int count=0;
	int i;
	scanf("%s",ch);
	while((*a)!='\0')
	{
	    temp=a;
        a++;
	    if((*temp)=='1')
	    {
	        temp++;
	        while((*temp)=='0')
	            temp++;
	        if((*temp)=='1')
	        count++;
	    }
	}
	printf("%d",count);
	
	return 0;
}
