# Severify-

# Prerequisites
This Application requires the following to run
-MySQL version 5.7
-PHP 7.2
or 
-XAMPP

# Installation
You must have an existing installation of MySQL and PHP to proceed to this step

1. Go to the directory of your MySQL CLI and paste the SQL file (smart.sql)
2. Open a terminal in the current directory and type the command mysql -u <user> -p
3. In the MySQL CLI type the following command: create database smart; . This will create
  an new database with the name of smart.
4. In the MySQL CLI, type exit; .
5. While still in the current directory, type in the following command
  mysql -u <username> -p smart < smart.sql
6. Move the rest of the files in xampp/htdocs.
7. Start your XAMPP Control panel and start MYSQL and Apache.
8. You can now access your site at by typing localhost/ in the browser
