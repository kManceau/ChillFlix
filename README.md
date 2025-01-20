# ChillFlix
### Setup the project :
To setup the project, just follow the following steps :
1. Clone this repository
2. In your SGDB, create a database named 'chillflix'
3. Create and fill a .env file with the database infos.
4. Inside the folder where you cloned the repository :

   4.1. Go to the folder /storage/app/public and create a folder named : "avatar"

   4.2. Open your favorite terminal and run the following commands :
* `composer install`
* `npm install`
* `npm run build`
* `php artisan storage:link`
* `php migrate:fresh --seed`

The project is now setup. You can deploy it or just test by running a test server using the command : `php artisan serve`
