def prime_check(listin):
    listout = []
    for x in listin:
        if isprime(x): listout.append(x)
    listout.sort()
    print listout
    
def isprime(number):  
    if number <= 1:
        return 0 
    if number == 2:
        return 1
    check = 3  
    maxneeded = number  
    while check < maxneeded + 1:  
        maxneeded = number / check  
        if number % check == 0:  
            return 0  
        check += 2  
    return 1  
        
prime_check([2, 44, 5, 3, 67, 17])

#DUPADUPADUPA DUPA DUPA