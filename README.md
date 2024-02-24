**#Requirement**
Installed Xampp, PHP, Composer, Nodejs, Vuejs and NPM
**#Guide**
-The project included source code and database
-After downloade project from github, add project folder into htdocs folder of Xampp
-Turn on Xampp and access to PHP Myadmin, then import database from sql file included in project. 
-Config DB fields in .env file if your DB config is not default of Xampp. Here are default settings for DB
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=interntest
    DB_USERNAME=root
    DB_PASSWORD=
- Open terminal and cd to project folder, run these line to run project:
  - npm run dev
  - php artisan serve
After run these 2 lines, there will be a link to open project on browser, click to it and it's done.
