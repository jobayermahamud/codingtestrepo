1.Clone git repo
https://github.com/jobayermahamud/codingtestrepo.git
and run composer install command 

2.Create .env file in root directory and copy all content from .env.example to .env file

3.Generate application key using  'php artisan key:generate' command

4.Create database for your project

5. Config database credential to .env file

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=DB_USER
DB_PASSWORD=DB_PASSWORD


6. Run 'php artisan migrate' command to create db tables


Regards
Jobayermahamud
Jobayermahamudkamalcse@gmail.com
