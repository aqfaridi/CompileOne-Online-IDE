def solve(m,n):
    # if "not (x in prime)", then the number is considered prime
    prime = [ True for x in range(n-m+1) ]
    # prime[0] -> m, prime[n-m] -> n
    
    # m == 1 is the only case not checked for in the following
    if m == 1: prime[0] = False
    
    # check if any numbers m..n are divisible by
    # any numbers from 2..sqrt(n)
    i = 2
    while i*i <= n:
        ss = m + (i - (m%i) )%i
        while ss <= n:
            if ss == i:
                ss += i
                continue
            prime[ss-m] = False
            ss += i
        i += 1
    
    for i in range(m,n+1):
        if prime[i-m]:
            print i

times = int(raw_input())
for i in range(times):
        line = raw_input()
        line = line.split()
        solve(int(line[0]),int(line[1]))
        print ""