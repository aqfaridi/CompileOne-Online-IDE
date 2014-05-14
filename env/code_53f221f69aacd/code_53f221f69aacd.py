import math
t=input()
for _ in range(t):
    n,m=map(int,raw_input().split(' '))
    for num in range(n,m+1):
        if all(num%i!=0 for i in range(2,int(math.sqrt(num))+1)):
            print num
        