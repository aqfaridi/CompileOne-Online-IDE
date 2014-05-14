def prime_check(listin):
    listout = []
    for x in listin:
        if x == 2: listout.append(x)
        for x in range(3, int(n**0.5)+1, 2):
            if n % x != 0:
                listout.append(x)
    listout.sort()
    return listout
prime_check([2, 44, 5, 3, 67, 17])