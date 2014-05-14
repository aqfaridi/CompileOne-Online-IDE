import sys

# Parse user input
case_count = int(sys.stdin.readline())
test_cases = [map(int, sys.stdin.readline().split()) for _ in range(case_count)]
max_int = max(test_cases, key=lambda x: x[1])[1]

# Generate a list of prime numbers
_prime_set_max = int(max_int ** 0.5) + 1
_prime_set = set(xrange(3, _prime_set_max, 2))
for p in xrange(3, int(max_int ** 0.25) + 1, 2):
   if p in _prime_set:
      _prime_set.difference_update(xrange(p + p, _prime_set_max, p))
primes = [2] + sorted(_prime_set)

def print_prime_range(min_p, max_p):
   max_p_sqrt = int(max_p ** 0.5)
   max_p_1 = max_p + 1
   prime_range = set(xrange(min_p // 2 * 2 + 1, max_p_1, 2))
   if 1 in prime_range: prime_range.remove(1)
   if min_p <= 2 <= max_p: print 2
   for p in primes:
      if p > max_p_sqrt: break
      if p in prime_range: print p
      prime_range.difference_update(xrange(min_p // p * p, max_p_1, p))
   for p in sorted(prime_range):
       #print p

# Main test case loop
for min_p, max_p in test_cases:
   print_prime_range(min_p, max_p)
   print
