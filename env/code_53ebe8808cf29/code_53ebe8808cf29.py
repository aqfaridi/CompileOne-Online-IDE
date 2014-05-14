# your code goes here
import math

def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2:
            listout.append(x)
        i = 3
        j = x
        print i
        print j
        while i <= math.sqrt(j):
            j = x / i
            print j
            if x % i != 0:
                i += 2
            else:
                listout.append(x)
    listout.sort()
    print listout
                    
prime_check([2, 44, 5, 3, 67, 17])