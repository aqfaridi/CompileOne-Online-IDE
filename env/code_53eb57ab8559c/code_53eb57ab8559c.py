# your code goes here
import sys
print "hello "
for i in range(0,sys.maxint):
    if i%2==0:
        print i,
        print "even"
    else:
        print i,
        print "odd"
