#include <iostream>
using namespace std;

int main() {
	long long int n;
	while(1)
	{
	    cin>>n;;
	    if(n==-1)
	    break;
	    else if (n%2==0)
	    cout<<n<<endl;
	    else
	    continue;
	}
	return 0;
}
