# your code goes here
import sys

def main():
	tc=input()
	while(tc):
		n=input()
		man=raw_input().split()
		woman=raw_input().split()
		sum=0
		for i in range(0,n):
			x=int(man[i])
			y=int(woman[i])
			sum=sum+x*y

		print sum

		tc=tc-1

main()
sys.exit(0)