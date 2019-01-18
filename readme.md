# laravel-adminLte-withLogin
A basic Laravel 5.6 project with AdiminLTE integrated with a custom login functionality


## Prerequisites
<ul>
<li>After cloning this repository, go to the root folder, run the following command/s,
<pre>
    composer install
    composer update</pre>
</li>
<li>Rename .env.example to .env and provide your database details there.</li>
<li>Import the sql file located at /resources/assets/super_admin.sql</li>

</ul>

## Running the project
<ul>
<li>Open `/admin` route on the browser(http://localhost:8000/admin - or whatever it is)</li>
<li>Enter the user name as 'super_admin' and password as 'super_admin'</li>
</ul>

## Changing the salt for the encrypted password
Open .env file and change the salt to what ever you want

## Change the password
Enter a password you want in the form and `dd(sha1($salt.$password));` at \app\Traits\LoginTrait.php at line 18, and save the hash as you password in the table :D :P

Alternatively you can create a registration form and then hash the entered password as `sha1($salt.$password)` and save it in the database.
