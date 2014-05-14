// shuffle algorithm example
#include <iostream>     // std::cout
#include <algorithm>    // std::shuffle
      // std::default_random_engine
#include <vector>
#include <ctime>

using namespace std;

int myrandom (int i) { return std::rand()%i;}

int main () {
    int arr[]  = {1,2,3,4,5};
  vector<int> foo(arr,arr+5);
  srand ( unsigned ( time(0) ) );
for(int i=0;i<5;i++){
  
  random_shuffle (foo.begin(), foo.end(),myrandom);

  for(int i=0;i<foo.size();i++)
     cout<<foo[i]<<" ";

    cout<<endl;
}
  return 0;
}