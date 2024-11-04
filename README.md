Installation Instructions:
1. Clone the repository link by invoking this command on the terminal:
git clone https://github.com/geek8mInd/moneyphp_laravel10.git moneyphp_laravel10

Note: The above command will pull all the files from the repository link
and will create a new folder named as "moneyphp_laravel10". This folder will
serve as the project folder for MoneyObject assignment.

2. On the project folder, create a new file and named it as .env

3. Next, copy the content below and paste it on .env file
#---------- Start of the Content of .env file ------------
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:U15kts0CK/JfoscqEIN/dUUn6yIeAB6i6LcGOFBpPvk=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_money_db
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
#-------------------- End of .env file -----------------------

2. Using a console terminal, login to your MySQL
Sample Command:
mysql -u<username> -p

Note: If you are using windows, you can use the Windows Power Shell;

3. Once logged-in to MySQL, create the database (as specified on DB_DATABASE entry above) by this command:
create database laravel_money_db;

4. To verify that the database is created, invoke this command.
show databases;

You should be able to see `laravel_money_db` as one of the databases. (See #2nd entry below)
+------------------------+
| Database               |
+------------------------+
| information_schema     |
| laravel_money_db       |
| mysql                  |
| performance_schema     |
| sys                    |
+------------------------+
9 rows in set (0.06 sec)

5. Then exit on MySql console by this command:
exit

Note: This command will logged-out your MySQL session but definitely the MySQL
service will be running in the background.

6. On the project folder (i.e. ) moneyphp_laravel10 run this artisan command:
php artisan migrate

Note: This command will create the database tables through running the migration files.

7. Next, on the project folder run this command to populate entries of `currencies` table:
php artisan db:seed

Note: This command will run the CurrenciesSeeder. A confirmation message will be displayed
once the artisan command completed its job.

8. Then, on the project folder run this command to display the MoneyObject project on your browser.
php artisan serve

Note: Usually this command will show the following message where default port is set to 8000 (see below)
  INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to stop the server

9. You can double click on the link, or just copy and paste it to your preferred browser.
10. The MoneyObject has the following modules:
> Currencies
> Calculator
> Discount
> Conversion
> Aggregation
Each of the module has its own inputs and specific requirements of validation.

Thank you and have a great day!