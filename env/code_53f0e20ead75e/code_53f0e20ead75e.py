import sys
m=input()
p=input()
aa =map(int,sys.stdin.readline().split(' '))
su,su2=0,0
if(m==p):
    aa.sort();
    print aa[m-1]
else:
    
    for i in range(p-m+1):
        su=su+aa[i]
    su2=sum(aa)-su
    ans=max(su,su2)
    print ans
    
