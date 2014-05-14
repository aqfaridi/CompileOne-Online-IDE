#include <iostream>
#include < cstdio>
#include < algorithm>
#include < cstring>
#include < sstream>
#include < vector>
#include < iomanip>
#include < cmath>
#include < map>
using namespace std;
typedef long long LL;
typedef pair< int,int> pii;
 
map< char,int> m;
int main()
{
    m['A'] = 9;
    m['B'] = 8;
    m['C'] = 7;
    m['D'] = 6;
    m['E'] = 5;
    m['S'] = 10;
 
    int t,n,var;
    long long sum,sum_of_credits;
    char ch;
    cin>>t;
    while(t--)
    {
        sum=0;
        sum_of_credits=0;
        cin>>n;
        for(int i=0;i< n;i++)
        {
           cin>>var>>ch;
           sum_of_credits += var;
           sum += m[ch] * var;
        }
        cout<< fixed<< setprecision(2)<< sum*1.0 / sum_of_credits<< endl;
    }
    return 0;
}

	// your code goes here
	return 0;
}
