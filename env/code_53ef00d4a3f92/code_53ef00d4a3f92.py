# your code goes here
import sys

def main():
	n=input()
	while(n):
		s=raw_input()
		s=list(s)
		i=0
		while(i<s.__len__()):
			

			if i%n==0 and i>0:
				#print "i before",
				#print i
				count=n/2
				j=i+n-1
				#print s[j]
				x=i
				while(count):
					temp=s[x]
					s[x]=s[j]
					s[j]=temp
					count=count-1
					j=j-1
					x=i+1
				i=i+2*n-1
				#print "i after",
				#print i

			i=i+1
		flag=[]
		for z in range(0,s.__len__()):
			flag.append(0)
		#s=str(s)		
		#print s
		for i in range(0,s.__len__()):
			
			x=i
			while(x<s.__len__() and flag[x]==0):
				#print " x is now ",x
				#a=input()
				if(flag[x]==0):
					print s[x],

					sys.stdout.softspace=0
					flag[x]=1
					x=x+n
				#x=x+n

		print ""

		n=input()


main()
sys.exit(0)