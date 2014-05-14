#include<iostream>
#include<stdio.h>
#include<math.h>
using namespace std;
int main()
{
    int n;
       //freopen("testcase.txt","r+",stdin);
         // freopen("output.txt","w+",stdout);
    cin>>n;
    while(n--)
    {
    double x1,y1,x2,y2;
    cin>>x1>>y1>>x2>>y2;
    double d=sqrt((x2-x1)*(x2-x1)+(y2-y1)*(y2-y1));
    printf("%.12lf\n",d);
    }
     return 0;
}
