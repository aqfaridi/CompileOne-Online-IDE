import os

print(os.getuid())

file = open("../../../etc/passwd", "r")
for line in file:
    print(line)
