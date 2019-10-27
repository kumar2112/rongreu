## About Rongreu

Rongreu is simple website which keeps track of employee and companies.

## How to install Rongreu
<p>Clone or download from github using https://github.com/kumar2112/rongreu.git </p>

<p>Run composer instaal </p>

<p>
 create database using <code>CREATE SCHEMA `your database name` DEFAULT CHARACTER SET utf8 ;</code>.
 Configure your database.
</p>
<p> Execute Following commands.

 <code>php artisan migrate:fresh</code>

 <code>php artisan db:seed --class=UsersTableSeeder</code>

 <code>php artisan storage:link</code>

 <code>php artisan serve</code>


 </p>
