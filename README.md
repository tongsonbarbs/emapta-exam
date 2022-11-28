## Emapta Exam
My assessment entry for the procedure of my application in Emapta as a Full Stack Web Developer.

This application consists simple authorization methods and data handling.

## Installation

Before installing this web application, make sure to have the following technologies listed:

-PHP 8.1.6 or later...
-Composer 2.3.10 or later...
-Node v16.16.0 or later...
-Latest Git version 

Please follow the steps below to be able to access the project:

1. Open your terminal, then clone this repository in your local directory.
```
    git clone https://github.com/tongsonbarbs/emapta-exam.git
```
2. Locate to the directory where you cloned the repository.
````
    cd emapta-exam
````
3. Run the following commands:
````
    composer install
    npm install
    cp .env.example .env
````
    >Note: If error occurs, please contact me at tongsonbarbs@gmail.com
4. Find the .env file in the root directory, then modify your database connection. (Please make sure you have created a database that is empty to avoid any errors)

````
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
````
5. In your terminal, run the following commands:
````
    php artisan key:generate
    php artisan migrate --seed
````
    >Note: If error occurs, please contact me at tongsonbarbs@gmail.com

6. Now, try to run the application via the commands below:

    >Note: You will have to open 2 instances of your terminal. 

````
    npm run dev
````

    In the other terminal:

````
    php artisan serve
````

Please register your admin account via signup to access all features.

Also, I have also created seeder for the roles as it wasn't mentioned in the instructions of this assessment, for I see no such way of adding roles in the application.

-Joshua Barbosa
