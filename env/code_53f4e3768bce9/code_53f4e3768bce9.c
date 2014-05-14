#include <stdio.h>

int main()
{
        int test_cases;
        scanf("%d",&test_cases);
        while(test_cases--)
        {
                int N,arr[10000],i=0;
                scanf("%d",&N);
                while(i++<N)
                {
                        scanf("%d",&arr[i]);
                        //i = i+1;
                }
                int x=255;
                char crr[N];
                for(int j=0;j<N;j++)
                {
                	arr[i]=arr[i]^x;
                	crr[i]=(char)arr[i];
                	printf("%c",crr[j]);
                }
                //your code here
             
               // test_cases--;
        }
        return 0;
}