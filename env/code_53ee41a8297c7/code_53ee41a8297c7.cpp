#include <iostream>
using namespace std;

int main() {
	
	struct human{
	    bool gender,
	    int height
	} man, woman;
	
	man firstMan = new man();
	firstMan->gender = true;
	firstMan->height = 180;
	
	printf ("Height: %d\n", firstMan->height);
	
	return 0;
}
