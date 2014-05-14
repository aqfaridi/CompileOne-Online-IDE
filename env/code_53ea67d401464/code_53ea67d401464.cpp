#include <iostream>
#include <sstream>
using namespace std;

int main() {
	// your code goes here
	
	int i = 10;
	
	ostringstream os;
	os.width(2);
	os << i;
	
	string temp = os.str();
	
	cout << "hello" << temp[0] << endl;
	cout << "hi" << temp[1] << endl;

	return 0;
}
