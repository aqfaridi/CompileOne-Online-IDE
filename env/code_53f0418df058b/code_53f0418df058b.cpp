#include <stdio.h>
int main()
{
    int x = 2;
    int arr[] = {1, 2, 3};
    switch (x)
    {
        case arr[0]: printf("Choice 1\n"); 
        case arr[1]: printf("Choice 2\n");
        case arr[2]: printf("Choice 3\n");
    }
    return 0;
}