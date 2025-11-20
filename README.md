How to Run the Project?
1. Open the Project Directory
Open VS Code and navigate to your XAMPP htdocs folder.
Your path should look like:
C:\xampp\htdocs

2. Clone the Repository
Open your VS Code terminal and run:
git clone https://github.com/co230046-sudo/StudentVolunteerMonitoring-IT.311-.git

Then enter the project:
cd student-record-management-system

3. Install Dependencies
Run:
composer install

This may take a while — wait until it finishes.

4. Create the .env File
Copy the example environment file:
cp .env.example .env

or manually create a .env file.

5. Update Database Settings
Inside .env, locate this block:
-------------
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
-------------
Replace it with:
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=srms_db

DB_USERNAME=root

DB_PASSWORD=
-------------
6. Create the Database
Open your browser and go to:
http://localhost/phpmyadmin

Create a new database named:
srms_db

7. Run Migrations & Generate App Key
Back in your terminal, run:

php artisan migrate:fresh
php artisan storage:link
php artisan key:generate

8. Start the Server
Finally start Laravel:
php artisan serve

Click the link provided — usually:
http://127.0.0.1:8000
