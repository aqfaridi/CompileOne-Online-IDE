    #include <stdio.h>
    #include <iostream>
    using namespace std;
    #include<string.h>
    int main()
    {
    int t,i,x,f,j;
    char a[1000];
    scanf(" %d",&t);
    while(t--)
    {f=0;
     
    scanf("%[^\n]%*c", a);
     
    x=strlen(a);
     
    for(i=0;i<x;i++)
    {f=0;
     
    if(a[i]=='*')
    {
    if(i>=x/2)
    { for(j=0;j<x;j++)
    {
    if( a[i]>=97 && a[i]<=122 )
    {
    f++;
    }
    if(f==x-i)	
    {	printf("%c",a[j]);	break;}
    }
     
    }
     
    }
    }
     
    }	
    return 0;
    }