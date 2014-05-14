// shuffle algorithm example
#include <iostream>     // std::cout
#include <algorithm>    // std::shuffle
#include <array>        // std::array
#include <random>       // std::default_random_engine

int main () {
    int arr[]  = {1,2,3,4,5};
  std::vector<int> foo(5);


  shuffle (foo.begin(), foo.end(), std::default_random_engine(3));

  std::cout << "shuffled elements:";
  for (int& x: foo) std::cout << ' ' << x;
  std::cout << '\n';

  return 0;
}