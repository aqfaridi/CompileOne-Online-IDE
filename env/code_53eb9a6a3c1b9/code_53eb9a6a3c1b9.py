import sys

def subseq(a,b):
	j=0
	for i in range(0,a.__len__()):
		while j<b.__len__():
			if a[i]==b[j]:
				break
			j=j+1
		if j>b.__len__():
			return 0
		i=i+1
		j=j+1
	return 1
	
def main():
	tc=input()
	while(tc):
		s=raw_input().split()
		a=s[0]
		b=s[1]
		if(a.__len__()<b.__len__()):
			flag=subseq(a,b)
		else:
			flag=subseq(b,a)

		if flag==1:
			print "YES"
		else:
			print "NO"
		
		tc=tc-1

main()
sys.exit(0)