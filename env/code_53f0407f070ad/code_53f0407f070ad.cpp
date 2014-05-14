#include<iostream>
#include<stdio.h>
using namespace std;
int main(void) {
    int c1=0,c2=0;
    for(int i=0; i<100; i++, c1++)
      for(int j=0; j<10; j++, c2++);{
        cout << " Count in FIRST = " <<c1 << endl;
        cout << " Count in SECOND  = " <<c2 << endl;
      }
  getchar();
  return 0;
}


