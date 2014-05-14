#include <iostream>
#include <sstream>
using namespace std;

int main() {
	// your code goes here
	
	int i = 4;
	string str = "vivek";
	ostringstream os;
	os.width(2);
	os.fill(0);
	os << i;
	
	string temp = os.str();
	
	str.append(temp);
	
	cout << "String :: " << str << endl;


	cout << "Size" << temp.size() << endl;
	cout << "hello" << temp[0] << endl;
	cout << "hi" << temp[1] << endl;

	return 0;
}
