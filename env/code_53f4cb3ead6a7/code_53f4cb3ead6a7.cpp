    #include <iostream>
    using namespace std;
    void onescomp(int num)
     
    {
     
    int rem;
     
     
     
    if (num <= 1)
     
    {
     
    cout << !num;
     
    return;
     
    }
     
    rem = num % 2;
     
    onescomp(num / 2);
     
    cout << !rem;
     
    }
    int main() {
    int t;
    scanf("%d",&t);
    while(t--)
    {
    int n;
    scanf("%d",&n);
    for(int i=0;i<n;i++)
    {
    int x;
    scanf("%d",&x);
    char y=(char)onescomp(x);
    cout<<y;
    }
    cout<<endl;
    }
    return 0;
    }