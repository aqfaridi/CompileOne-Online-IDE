#include< cstdio>

#include<iostream>
#include<vector>
using namespace std;

int main()
{
    vector<int> v,vi;
    v.reserve(1);
    vi.reserve(1);
    int t,j,a,as,av;
    t=a=as=av=0;
    j=0;
    vi[0]=0;

    while(t!=-1)
    {
                cin>>t;
                if (t == -1)
                {
                break;
                }
                else
                {
                    for( int i=0;i<t;i++)
                    {
                         cin>>a;
                         as=as+a;
                         v[i]=a;
                    }
                    if (as%t !=0)
                    {
                            vi[j]=-1;
                            j++;
                            continue;
                    }
                }  

                av=as/t;

                for ( int i=0;i<t;i++)
                {
                    if (v[i]>av)
                    {
                                vi[j]=vi[j]+(v[i]-av);
                    }

                }
                //cout<<k[j];
                j++;
         }

        for( int i=0;i<j;i++)
        {
             cout<<vi[i]<<endl;
        }
        system("pause");
        return 0;
    }
}

