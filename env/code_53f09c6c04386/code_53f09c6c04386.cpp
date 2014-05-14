#include<iostream>
#include<stdio.h>

using namespace std;
int main()
{
    int mapping[200] = {0};
    int startingVal = 9;
    // map alphabets with values
    for(int i = 65; i <= 69; ++i)
    {
        mapping[i] = startingVal;
        startingVal--;
    }
    // value of S
    mapping[83] = 10;

    int t, n;

    // take input
    scanf("%d", &t);
    while(t-->0)
    {
        int val;
        double creditSum = 0;
        double totalSum = 0;
        char ch;
        scanf("%d", &n);

        for(int i = 0;i < n; ++i)
        {
            cin>>val;
            cin>>ch;

            creditSum += val;
            totalSum += mapping[ch]*val;

        }
        printf("%.2lf\n", totalSum/creditSum);
    }
    return 0;
}