// shuffle algorithm example
#include <iostream>     // std::cout
#include <algorithm>    // std::shuffle
      // std::default_random_engine
#include <vector>

int main () {
    int arr[]  = {1,2,3,4,5};
  vector<int> foo(5);


  shuffle (foo.begin(), foo.end(), 3);

  std::cout << "shuffled elements:";
  for (int& x: foo) std::cout << ' ' << x;
  std::cout << '\n';

  return 0;
}