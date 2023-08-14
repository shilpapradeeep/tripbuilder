<b>Flight Booking Project by Shilpa</b>

This is a flight booking project I created using Laravel version 10.17.1, and it requires PHP version > 8.1.

Here's a breakdown of the components I utilized to develop this application:

<ul>
    <li>Migrations (database/migrations/*)</li>
    <li>Database Seeding (/*)</li>
    <li>Resources/Collections (app/Http/Resources/*)</li>
    <li>Controllers (app/Http/Controllers/*)</li>
    <li>Request Validation (app/Http/Requests/*)</li>
    <li>Resource Routing (routes/api.php)</li>
    <li>Eloquent ORM / Models (app/Model/*)</li>
</ul>

<b>How to run this project.</b>
<br>To run this project, follow these steps:

1.Create a new database and update the file .env with the new database information.
2.Update the DATABASE CONSTANTS with the database info you created.
3.Run the following commands in the terminal:

Then run the following Commands:

$ git clone https://github.com/shilpapradeeep/tripbuilder.git    
$ cd tripbuilder    
$ composer install    
$ php artisan migrate    
$ php artisan db:seed    
$ php artisan serve

This will populate the database with testing data and run the app on port 8000. You should be able to access it by going to: http://127.0.0.1:8000 (or whatever domain you use to host the project).
