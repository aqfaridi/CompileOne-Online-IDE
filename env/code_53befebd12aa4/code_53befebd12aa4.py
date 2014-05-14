N,P,K = map(int, raw_input().split(' '))
arr = raw_input().split(' ')
arr.sort()
arr1 = [0]*P;
cnt = 0
for i in range(N):
    if((int(arr[i-1])-int(arr[i]))<= K):
        cnt = cnt+1
        arr1.append(cnt)
arr1.reverse()
print arr1
while(P>0):
    A,B = map(int,raw_input().split(' '))
    P = P-1
    if((int(arr1[B])-int(arr1[A])) == (B-A)):
        print "Yes"
    else:
        print "No"