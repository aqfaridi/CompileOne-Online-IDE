import sys

def isSubset(arr,n,sum):
	if sum==0:
		return 1
	if n==0 and sum!=0:
		return 0

	if arr[n-1]>sum:
		return isSubset(arr,n-1,sum)

	return isSubset(arr,n-1,sum)||isSubset(arr,n-1,sum-arr[n-1])

def main():
	tc=input()
	while(tc):
		s=raw_input().split()
		n=int(s[0])
		m=int(s[1])
		arr=[]
		for i in range(0,n):
			temp=input()
			arr.append(temp)
		if(isSubset(arr,n,m)==1):
			print "Yes"
		else:
			print "No"
		
		tc=tc-1

main()
sys.exit(0)