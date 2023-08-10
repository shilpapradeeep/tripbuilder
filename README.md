I am Shilpa - This is a flight booking project I created, using laravel framework. 


Here is a list of things I used to develop this application:


#Migrations database/migrations/*  
#Database Seeding /*  
#Resources/Collections app/Http/Resources/*  
#Controllers app/Http/Controllers/*  
#Request Validation app/Http/Requests/*  
#Resource Routing routes/api.php  
#Eloquent ORM / Models app/Model/*

How to run this project.
You will need a new database, and to run the following commands in the terminal.

Create a database and update file .env with this new database informaiton.
update DATABASE CONSTANTS with the database info you created.

Then run the following Commands:

$ git clone https://github.com/shilpapradeeep/tripbuilder.git
$ cd tripbuilder
$ composer install
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve

This will populate the database with the testing data. 

This will also run the app on port 8000, hence you should be able to run it by going to: http://127.0.0.1:8000 (or whatever domain you use to host the project)

