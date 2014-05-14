import math
t=input()
for _ in range(t):
    n,m=map(int,raw_input().split(' '))
    count=0
    a='7'
    for num in range(n,m+1):
        if all(num%i!=0 for i in range(2,int(math.sqrt(num))+1)):
            if(num>=n):
                if(a in str(num)):
                    count+=1
    if(count == 0):
        print -1
    else:
        print count
        