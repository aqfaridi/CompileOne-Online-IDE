arr = list()
N,P,K = map(int, raw_input().split(' '))
arr=map(int,raw_input().split())
arr.sort()
arr1 = arr1[0]*N;
cnt = 0
arr2 = list()
print arr
for i in range(1,N-1):
    if((int(arr[i-1])-int(arr[i]))<= K):
        cnt = cnt+1
        arr1.append(cnt)
    else:
        arr1.append(0)
arr2 = arr1[-N:]
print arr2
while(P>0):
    A,B = map(int,raw_input().split(' '))
    P = P-1
    if((int(arr1[B])-int(arr1[A])) == (B-A)):
        print "Yes"
    else:
        print "No"