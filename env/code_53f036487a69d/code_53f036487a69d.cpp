#include<iostream>

using namespace std;
int main()
{
    int i,a,b;
    cout<<"a:"<<"\n";
    cin>>a;
    cout<<"b:"<<"\n";
    cin>>b;
    cout<<"1.add"<<"\n";
    cout<<"2.sub"<<"\n";
    cout<<"3.mult"<<"\n";
    cout<<"4.div"<<"\n";
    cout<<"5.exit"<<"\n";
    cout<<"enter the value:";

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
