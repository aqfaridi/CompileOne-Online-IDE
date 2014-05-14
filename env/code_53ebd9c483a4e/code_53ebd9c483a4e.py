def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2: listout.append(x)
        for i in xrange(2, x):
            if a % i:
                listout.append(x)
    listout.sort()
    print listout
    
prime_check([2, 44, 5, 3, 67, 17])