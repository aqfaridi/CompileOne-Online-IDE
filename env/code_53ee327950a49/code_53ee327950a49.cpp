#include<bits/stdc++.h>
using namespace std;
int main()
{
    int x1,y1,x2,y2,d,d1,d2,x3,x4,y3,y4;
    while(cin>>x1>>y1>>x2>>y2)
    {
        if(x1==x2 && y1!=y2)
        {
            d=abs(y1-y2);
            x3=x1+d;
            y3=y1;
            x4=x1+d;
            y4=y2;
        }
        else if(y1==y2 && x1!=x2)
        {
            d=abs(x1-x2);
            x3=x1;
            y3=y1+d;
            x4=x2;
            y4=y1+d;
        }
        else if(x1!=x2 && y1!=y2)
        {
            d1=abs(x1-x2);
            d2=abs(y1-y2);
            if(d1==d2)
            {
                x3=x1+d1;
                y3=y1;
                x4=x1;
                y4=y1+d2;
            }
            else
            {
                cout<<"-1"<<endl;
            }
        }
    }
}