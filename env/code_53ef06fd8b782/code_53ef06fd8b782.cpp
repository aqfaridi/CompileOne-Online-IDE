using namespace std;
 
int main() {
int t;
cin>>t;
while(t--)
{
string arr="0manku";
 
long long int n;
cin>>n;
while(n>0)
{
char a[30];
long long int x=n%5,i=0,size=0;
if(x)
{
a[i++]=arr[5];
size++;
n=n-1;
n=n/5;
}
else
{
a[i++]=arr[x];
size++;
}
cout<<size;
//for(int l=size;l>=0;l--)
//cout<<a[l];
}
}
return 0;
}