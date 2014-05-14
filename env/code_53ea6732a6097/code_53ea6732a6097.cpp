#include <iostream>
#include <sstream>
using namespace std;

int main() {
	// your code goes here
	
	int i = 10;
	
	ostringstream os;
	os.width(2);
	os << 10;
	
	cout << os.str() << endl;
	
	
	os.flush();
	i = 2;
	cout << os.str() << endl;
	return 0;
}
