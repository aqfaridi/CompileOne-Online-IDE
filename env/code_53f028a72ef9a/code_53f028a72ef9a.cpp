#include <iostream>
using namespace std;

int main()
{
	long long o=1,n=1;
	for(int i=0;i<87;i++)
	{
	    cout<<n<<" ";
		n=n+o;
		o=n-o;
	}
	return 0;
}
