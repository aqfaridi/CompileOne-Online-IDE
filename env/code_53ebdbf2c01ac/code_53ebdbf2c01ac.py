def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2: listout.append(x)
        i = 3
        j = x
        while i < j + 1:
            j = x / i
            if x % i != 0:
                listout.append(x)
            i += 2
#        for i in range(2, x):
#            if x % i:
#                listout.append(x)
    listout.sort()
    print listout
    
prime_check([2, 44, 5, 3, 67, 17])

    def isprime(number):  
        if number<=1 or number%2==0:  
            return 0  
        check=3  
        maxneeded=number  
        while check<maxneeded+1:  
            maxneeded=number/check  
            if number%check==0:  
                return 0  
            check+=2  
        return 1  