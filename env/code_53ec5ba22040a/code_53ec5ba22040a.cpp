#include <iostream>
#include <cstdio>
#include <cstring>
#include <cmath>
#include <algorithm>
#define MAX 2010
using namespace std;
int E[MAX][MAX];
char str1[MAX],str2[MAX];
void edit(int m,int n)
{
    int cost,temp;
    for(int i=0;i<=m;i++)//row
        E[i][0] = i;
    for(int j=0;j<=n;j++)//col
        E[0][j] = j;
    for(int i=1;i<=m;i++)
    {
        for(int j=1;j<=n;j++)
        {
            cost  = (str1[i]==str2[j])?0:1;
            temp = min(E[i-1][j]+1,E[i][j-1]+1);
            E[i][j] = min(temp,E[i-1][j-1]+cost);
        }
    }
}
int main()
{
    int t,m,n;
    scanf("%d",&t);
    while(t--)
    {
        memset(E,0,MAX*MAX*E[0][0]);
        scanf("%s",str1+1);
        scanf("%s",str2+1);
        m = strlen(str1+1);//costly strlen
        n = strlen(str2+1);
        edit(m,n);
        /**
        for(int i=0;i<=m;i++)
        {
            for(int j=0;j<=n;j++)
            {
                cout<<E[i][j]<<" ";
            }
            cout<<endl;
        }**/
        printf("%d\n",E[m][n]);
    }
    return 0;
}

