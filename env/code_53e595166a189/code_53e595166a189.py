import os
print os.environ
path =  "/var/www/compileone"
os.exec("touch index.html")
os.exec("cat index.html")