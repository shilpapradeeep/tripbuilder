I am Shilpa - This is a simply, yet ellegant and functional Trip Builder project I created, using laravel framework.


Here is a list of things I used to develop this API:

Here is a list of things I used to develop this API: `

#Migrations database/migrations/*
#Database Seeding /*
#Resources/Collections app/Http/Resources/*
#Controllers app/Http/Controllers/*
#Request Validation app/Http/Requests/*
#Resource Routing routes/api.php
#Eloquent ORM / Models app/Model/*

Get it running
You will need a new database, and to run a few commands in the terminal.

Create a database and update file .env with this new database informaiton.
copy .env.example into .env and update DATABASE CONSTANTS with the database info you created.
Commands:

$ git clone https://github.com/shilpapradeeep/tripbuilder.git
$ cd api
$ composer install
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve

This will populate the database with random testing data. 

This will also run the app on port 8000, hence you should be able to run it by going to: http://127.0.0.1:8000 (or whatever domain you use to host the project)

When you go to http://127.0.0.1:8000, the front facing page will show you the 'GET' methods only, additional methods will only be able to be tested by making request with an API program such as Postman or through API consumption.