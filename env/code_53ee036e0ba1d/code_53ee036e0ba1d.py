import sys

def main():
	tc=input()
	while(tc):
		n=input()
		man=raw_input().split()
		woman=raw_input().split()
		sum=0
		for i in range(0,n):
			man[i]=int(man[i])
			woman[i]=int(woman[i])
		man.sort()
		woman.sort()
		for i in range(0,n):
			sum=sum+man[i]*woman[i]
			
		print sum

		tc=tc-1

main()
sys.exit(0)