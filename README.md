#Compileone (Online Compiler)

It is an Integrated Development Environment (IDE) which
provides facilities to programmer for software development such as source code editing and management and testing. CompileOne is designed by keeping in mind the requirements of coders to create templates, files, folders to maintain his/her codes for each contest.
##Core Technologies Used 

- BackEnd : PHP,Python,Apache Server 2
- FrontEnd : Twitter Bootstrap,Ajax,jQuery,JSON,CSS,HTML 
- Database : Mysql
- Sandboxing : chroot(jail)


##Features

- User can create/save/delete Programs or Folders on server.
- User can rename/cut/copy/paste Programs or Folders.
- User can save his default template , that can be easily loaded for any program in any language.
- User can import and export his programs (Zipped format).Online Compiler System
- User can share his codes links (secret mode) 
- User can work in fullscreen editor mode.
- User can change editor type. (like vim,emacs)
- User can change editor theme (more than 10 themes)
- User can change editor Font Size.(as per requirement).
- User can Zoom In input/output textarea.


##Sandboxing : to prevent hackers to shutdown your server

you can configure chroot(jail) on your system read chroot.txt (if interested)

- code is frequently buggy and potentially malicious.
- Code must run in a restricted environment (sandbox) to prevent it from damaging the system.
- Resources (particularly, CPU time and memory) must be restricted.
- Programs must be limited to a single thread.
Programs must not be permitted to spawn other processes.
- Programs must not be permitted to initiate system calls.
- Programs must not be able to communicate through TCP/IP Sockets.





##Pre-requisites

- Update your system : Ubuntu Source list generator: https://repogen.simplylinux.ch/generate.php

```
	sudo apt-get update
	sudo apt-get upgrade
```

- Install MySQL

```
	sudo apt-get install mysql-server
```

	+ Start/Stop Mysql server 
	
	```
		sudo service mysql start
		sudo service mysql stop
	```

	+ To log in to MySQL as the root user:
	
	```
		mysql -u root -p
	```

	+ Create a New MySQL User and Database

	```
		create database testdb;
		create user 'testuser'@'localhost' identified by 'password';
		grant all on testdb.* to 'testuser';
	```




- Install phpmyadmin : phpMyAdmin is a web application that provides a GUI to aid in MySQL database administration

	+ Step 1: Install Apache2, PHP and MySQL. We assume you already have installed LAMP on your system.

		- Install Apache 
		```
			sudo apt-get install apache2
			sudo service apache2 restart
		```

		- Install PHP

		```
			sudo apt-get install php5
		```
				
		-If you need MySQL support also install php5-mysql
		
		```
			sudo apt-get install php5-mysql
		```

	+ Step 2: Install phpMyAdmin.

	```
		sudo apt-get install phpmyadmin
	```

		- After the installation has completed, add phpmyadmin to the apache configuration.
		```
			sudo vi /etc/apache2/apache2.conf
		```

		- Add the phpmyadmin config to the file.
		```
			Include /etc/phpmyadmin/apache.conf
		```

		- Restart apache:
		```
			sudo service apache2 restart
		```

##Database Import

-create database compileone on Mysql
-Import compileone.sql database from phpmyadmin
-Download this repository and extract to /var/www directory

##Install packages

	```
		sudo apt-get install python-psutil
		sudo apt-get install python-mysqldb
	```

	- Install the compilers of  programming languages you need on your system with sudo apt-get
	- Languages : Java, C, C++, Pascal,PHP, Perl, Ruby and Python,Haskell,Pike etc.

##Database dependencies in code

- Change system_config.php for database username and password

- open judge.py & change line 66 and line 293 with your database username and password

```
db = MySQLdb.connect("localhost","db_user","db_pass","compileone")
```


To Run :
http://localhost/compileone 