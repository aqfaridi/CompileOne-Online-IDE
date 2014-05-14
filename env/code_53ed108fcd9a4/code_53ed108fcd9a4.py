# your code goes here
import sys

def byteland(n,m,arr):
	size=pow(2,n)
	
	for counter in range(0,size):
		temp=[]
		for j in range(0,n):
			if(counter & (1<<j)):
				temp.append(arr[j])
		sum=0
		for z in range(0,temp.__len__()):
			sum=sum+temp[z]

		if sum==m:
			return 1


	return 0


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
		x=byteland(n,m,arr)
		if x==1:
			print "Yes"
		else:
			print "NO"
		tc=tc-1

main()
sys.exit(0)