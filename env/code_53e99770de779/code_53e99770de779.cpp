#include <iostream>
using namespace std;

int main() {
	int i=5;
	int x;
	x = ++i + i++ + ++i + i++;
	cout<<i<<" "<<x<<endl;
	return 0;
}
