# rti
RTI POC

# Base framework

This project is using Laravel 5.4. Laravel uses a file .env to manage server variables. 

# Database configuration

The database configuration is set as server variables inside .env file. Make sure you have the right values for you environment for the following keys:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

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

The document root folder needs to be readeable by webserver user. Besides, you need to have proper permission in `storage` folder in order to run some artisan commands. That folder needs to be writable by the webserver user and whichever user you use to run `php artisan` commands  
 
 
# Cloning the repo
run git clone command to clone the repo
```
git clone https://github.com/jrareas/rti.git
```
# Composer
To get the app dependencies, open a terminal session and use composer in the app root folder
```
composer install
```
# Node modules
The application uses laravel mix to compile the assets run the command below to install node dependencies:
```
npm install
```
# Building assets
The assets need to be generated in the public folder. Run the command below to acomplish that:
```
npm run dev
```
To deploy to production and get the minimized versions run:
```
npm run production
```
To watch the changes and recompile when it needed run:
```
npm run watch
```
# Migrations

run migrate command as below to initialize the database. If you experience any permission issue when run this command you may need to recreate the database after fix the permissions to the `storage` folder.

```
php artisan migrate
```

This will initialize the database.

# Connecting to themoviedb

In order to get data from themoviedb, an API key is required. Please make sure you have the right API key in the .env file as below:

```
MOVIE_DB_API_KEY=apikey
```

# Using the website

You will need to register a user before start using the site. The registration has no validation process. Once you register, you will be able to login and access the website.