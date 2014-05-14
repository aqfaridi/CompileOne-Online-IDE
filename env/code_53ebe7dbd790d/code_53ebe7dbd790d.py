# your code goes here
def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2:
            listout.append(x)
            i = 3
            j = x
            while i < j + 1:
                j = x / i
                if x % i != 0:
                    listout.append(x)
                    i += 2
    listout.sort()
    print listout
                    
prime_check([2, 44, 5, 3, 67, 17])