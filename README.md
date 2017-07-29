# rti
RTI POC

# Base framework

This project is using Laravel 5.4. Laravel uses a file .env to manage server variables. 

# Database configuration

The database configuration is set as server variables inside .env file. Make sure you have the right values for you environment for the following keys:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

# Apache configuration

Follow below an example of VirtualHost using apache. Make sure to adapt the values if you are using a different webserver.

```
<VirtualHost *:80>
        DocumentRoot /Users/joseareas/Developer/php/RTI/public
        ServerName rti.loc
        <Directory "/Users/joseareas/Developer/php/RTI/public" >
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
```
Make sure you have the servername in you hosts file.

# Folder permission

The document root folder needs to be readeable by webserver user. Besides, you need to have proper permission in storage folder in order to run some artisan commands. That folder needs to be writable by the webserver user and whichever user you use to run `php artisan` commands  
 