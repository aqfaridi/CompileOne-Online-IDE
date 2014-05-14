#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>
#include <math.h>
#include <limits.h>
#include <set>
#include <algorithm>
#include <iostream>
#include <vector>
#include <stack>
#include <string>
#include <list>
#include <map>
#include <queue>
#include <sstream>
#include <utility>
using namespace std;
#define gc getchar_unlocked
#define i64 long long
char ch;
void rd(int &x)
{
    register int c = gc();
    x = 0;
    for(;(c<48 || c>57);c = gc());
    for(;c>47 && c<58;c = gc()) {x = (x<<1) + (x<<3) + c - 48;}
}

int a[800009],rotn[800009][13];
struct node
{
	int maxm[12],add;
	void merge(node &l,node &r)
	{
		for(int j=0;j<12;j++)
        maxm[j]=max(l.maxm[j],r.maxm[j]);
		add=0;
	}
	
	void split(node &l,node &r)
	{
		l.add=(l.add+add)%12; r.add=(r.add+add)%12;
		
		int k , tmp[12],val=add;
		for ( k = 0 ; k < 12 ; k++ )
		{
		tmp[(k-val+12)%12] = l.maxm[k];
		}
		for ( k = 0 ; k < 12 ; k++ ) l.maxm[k] = tmp[k];
        
        
        for ( k = 0 ; k < 12 ; k++ )
		{
		tmp[(k-val+12)%12] = r.maxm[k];
		}
		for ( k = 0 ; k < 12 ; k++ ) r.maxm[k] = tmp[k];
  		
		add=0;
	}
}
tree [ 1<<21];

void build(int root,int i,int j)
{
	if(i==j)
	{
		int k;
		tree[root].add=0;
        for(k=0;k<12;k++)
        {tree[root].maxm[k]=rotn[i][k];
        //cout<<root<<" "<<" "<<i<<" "<<k<<" "<<tree[root].maxm[k]<<" "<<tree[root].add<< endl;
        }
        return;
    }
        
    int m=(i+j)/2,l=2*root,r=2*root+1;
    
    build(l,i,m);
    build(r,m+1,j);
    
    tree[root].merge(tree[l],tree[r]);
	
	//cout<<root<<" "<<tree[root].sum<<" "<<tree[root].add<<" "<<tree[root].numleaves<<endl;
}


node range_query(int root,int l,int r,int i,int j)
{
	if(l==i && r==j)
	{
	 //cout<<root<<" "<<tree[root].maxm[0]<<" "<<tree[root].maxm[1]<<" "<<tree[root].maxm[2]<<" "<<tree[root].maxm[3]<<" "<<tree[root].add<<endl;
     return tree[root];
	} 
	
	int m=(l+r)/2;
	
	node res,left,right;
    tree[root].split(tree[2*root],tree[2*root+1]);

	if(j<=m)
	res=range_query(2*root,l,m,i,j);
	
	else if(i>m)
	res=range_query(2*root+1,m+1,r,i,j);
	
	else
	{
		left=range_query(2*root,l,m,i,m);
		right=range_query(2*root+1,m+1,r,m+1,j);
		
		res.merge(left,right);
	}
	
	tree[root].merge(tree[2*root],tree[2*root+1]);
	 //cout<<root<<" "<<tree[root].maxm[0]<<" "<<tree[root].maxm[1]<<" "<<tree[root].maxm[2]<<" "<<tree[root].maxm[3]<<" "<<tree[root].add<<endl;

	return res;	
}

void range_update(int root,int l,int r,int i,int j,int val)
{
	if(l==i && r==j)
	{
		val=val%12;
		int k , tmp[12];
		for ( k = 0 ; k < 12 ; k++ )
		{
		tmp[(k-val+12)%12] = tree[root].maxm[k];
		}
		for ( k = 0 ; k < 12 ; k++ ) tree[root].maxm[k] = tmp[k];
				
		tree[root].add+=val;
		 //cout<<root<<" "<<tree[root].maxm[0]<<" "<<tree[root].maxm[1]<<" "<<tree[root].maxm[2]<<" "<<tree[root].maxm[3]<<" "<<tree[root].add<<endl;

		return;
	} 
	
	int m=(l+r)/2;
	tree[root].split(tree[2*root],tree[2*root+1]);

    if(j<=m)
	range_update(2*root,l,m,i,j,val);
	
	else if(i>m)
	range_update(2*root+1,m+1,r,i,j,val);
	
	else
	{
		range_update(2*root,l,m,i,m,val);
		range_update(2*root+1,m+1,r,m+1,j,val);
			
	}
		
	tree[root].merge(tree[2*root],tree[2*root+1]);
     //cout<<root<<" "<<tree[root].maxm[0]<<" "<<tree[root].maxm[1]<<" "<<tree[root].maxm[2]<<" "<<tree[root].maxm[3]<<" "<<tree[root].add<<endl;
     
}

int main()
{
	//ios_base::sync_with_stdio(false);
	int x,y,ch,n,m,val,i,j,k,l,num;
	char s[5],t[5];
	rd(n);
	for(i=0;i<n;i++){
		
		rd(num);		
		l=0;
		while(num>0)
		s[l]=num%10+'0',num/=10,l++;
		s[l]='\0';
		reverse(s,s+l);	
		
		
		for(j=0;j<12;j++){
			
			if(j<l){
				for(k=0;k<l;k++){
					
					t[k]=s[(k+l+j)%l];
				}
				t[k]='\0';
				rotn[i][j]=atoi(t);
			}
			else
			rotn[i][j]=rotn[i][j%l];
							
		}
	}
				
	build(1,0,n-1);
	
	rd(m);
	while(m--)
	{
		rd(ch);rd(x);rd(y);if(x>y)swap(x,y);
		if(ch==0)
		{
			rd(val);
			range_update(1,0,n-1,x,y,val);
		}	
		else
		{
			node res=range_query(1,0,n-1,x,y);
			printf("%d\n",res.maxm[0]);
		}
	}
    
	return 0;
}			