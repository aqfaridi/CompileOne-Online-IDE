#include <iostream>
#include<cstdio>
using namespace std;

int main() {
    unsigned long long n,a,count=0;
    scanf("%llu",&n);
    while(n--)
    {
        scanf("%ull",&a);
        if(a<3*100000000)
        count++;
    }
    printf("%llu\n",count);
	// your code goes here
	return 0;
}
