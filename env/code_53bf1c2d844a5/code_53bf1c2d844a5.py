arr = list()
N,P,K = map(int, raw_input().split(' '))
arr=map(int,raw_input().split())
arr.sort()
arr1 = []*N;
cnt = 0
arr2 = list()
print arr
for i in range(1,N):
    if((int(arr[i-1])-int(arr[i]))<= K):
        cnt = cnt+1
        arr1.append(cnt)
    else:
        arr1.append(0)
arr2 = arr1[-N:]
print arr1
while(P>0):
    A,B = map(int,raw_input().split(' '))
    P = P-1
    if((int(arr2[B-1])-int(arr2[A-1])) == (B-A)):
        print "Yes"
    else:
        print "No"