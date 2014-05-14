#include<iostream>

using namespace std;
int main()
{
    int i,a,b;
    cout<<"a:"<<"\n";
    cout<<"b:"<<"\n";
    cin>>a>>b;
    cout<<"1.add";
    cout<<"2.sub";
    cout<<"3.mult";
    cout<<"4.div";
    cout<<"5.exit";
    cout<<"enter the value:";
    cin>>i;
    switch(i)
    {
    case 1:
    cout<<"result:"<<a+b;
    break;
    case 2:
         cout<<"result:"<<a-b;
    break;
    case 3:
         cout<<"result:"<<a*b;
         break;
    case 4:
         cout<<"result:"<<a/b;
         break;
    case 5:

    break;
    default:
    cout<<"entered wrong value";
    break;
    }
 return 0;
}
