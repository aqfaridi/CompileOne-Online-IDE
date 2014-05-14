#include <iostream>
#include <cstring>
using namespace std;

int main()
{
        int test_cases;
        cin>>test_cases;
        while(test_cases > 0)
        {
                int N,arr[10000],i=0;
                char s[10009];
                cin>>N;
                
                while(i<N)
                {
                       	cin>>arr[i];
                        i = i+1;
                        s[i]=(char)(255-arr[i]);
                }
                
                for(int j=0;j<N;j++)
                	cout<<s[j];
                cout<<endl;
                //your code here
                
                test_cases--;
        }
        return 0;
}