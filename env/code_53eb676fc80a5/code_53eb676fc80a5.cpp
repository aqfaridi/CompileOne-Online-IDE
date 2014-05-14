#include<iostream>
#include<stdio.h>
using namespace std;
char c[350+5][350+5];
unsigned int num[350+5][350+5]={0};
unsigned int counter=0,n;
void dfs(unsigned int i,unsigned int j)
{
     if(num[i][j]!=0 || c[i][j]=='X' || i==n+1 || j==n+1 ||i==0||j==0)
     return;
     else
     {
         num[i][j]=counter;
         dfs(i+1,j);
         dfs(i,j+1);
         dfs(i-1,j);
         dfs(i,j-1);
     }
      
}
int main()
{
    unsigned int t;
     // scanf("%ud",&t);
      //while(t--)
      //{
                cin>>n;
                for(unsigned int i=1;i<=n;i++)
                {
                        for(unsigned int j=1;j<=n;j++)
                        cin>>c[i][j];
                }

                
                for(unsigned int i=1;i<=n;i++)
                {
                        for(unsigned int j=1;j<=n;j++)
                        {
                                if(c[i][j]=='O' )
                                {
                                  counter++;
                                  dfs(i,j);
                                }
                        }
                }
               /* for(int i=1;i<=n;i++)
                {
                        for(int j=1;j<=n;j++)
                        {
                                cout<<num[i][j]<<" ";
                        }
                        cout<<endl;
                }
                */
                
                unsigned int p,x,flag=0,y;
                cin>>p;
                cin>>x>>y;
                unsigned int ans=num[x][y];
                
                for(unsigned int l=1;l<p;l++)
                {
                             cin>>x>>y;
                             if(num[x][y]!=ans)
                             {
                                               flag=1;
                                               break;
                             }
                }
                if(flag)
                cout<<"No";
                else cout<<"Yes";
      //}
     return 0;
}
