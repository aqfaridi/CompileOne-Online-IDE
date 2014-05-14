#include <iostream>
using namespace std;

int main()
{
	long long o=1,n=1;
	for(int i=0;i<87;i++)
	{
		n=n+o;
		o=n-o;
	    cout<<n<<" ";
	}
	return 0;
}
