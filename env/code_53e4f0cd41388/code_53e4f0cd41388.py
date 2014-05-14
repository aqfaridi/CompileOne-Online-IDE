import os
real_root = os.open("/", os.O_RDONLY)
os.chroot("/mnt/new_root")
# Chrooted environment
# Put statements to be executed as chroot here
os.fchdir(real_root)
os.chroot(".")

# Back to old root
os.close(real_root)