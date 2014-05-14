def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2: listout.append(x)
        for y in range(3, int(x**0.5+1), 2):
            if x % y != 0:
                listout.append(x)
    #listout.sort()
    print listout
    
prime_check([2, 44, 5, 3, 67, 17])