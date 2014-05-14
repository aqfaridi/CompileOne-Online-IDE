# your code goes here
import math

def check_prime(number):
    

def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2:
            listout.append(x)
        i = 3
        j = x
        while i <= math.sqrt(j):
            j = j / i
            if j % i != 0:
                i += 2
            else:
                listout.append(x)
    listout.sort()
    print listout
                    
prime_check([2, 44, 5, 3, 67, 17])