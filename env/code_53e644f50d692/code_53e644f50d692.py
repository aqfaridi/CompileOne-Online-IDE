t=input()
for _ in range(t):
    x,y = map(int,raw_input().split(' '))
    if(x == 0 and y == 0):
	print "YES"
    elif(x%2==0 and y%2==0 and y != 0): 
	if(x >0 and y>0 and y <= x ): 
	     print "NO"
	elif(abs(y) < abs(x)):
	    print "NO"
	else:
	    print "YES"
    elif(x<0 and x%2 == 0 and (y <= x or y >= x)):
            print "YES"
    elif(x%2 != 0 and y%2 == 0):
	print "YES"
    elif(x%2 !=0 and y%2 != 0 and x>=0):
	if(y <= x+1 and y>=0):
	    print "YES"
	elif(y<0 and y>= -x+1):
	    print "YES"
	else:
	    print "NO"

    else:
	print "NO"

