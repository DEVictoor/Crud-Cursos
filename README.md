# Getting started

## Installation

Clone the repository

    git clone https://github.com/DEVictoor/Crud-Cursos.git

Switch to the repo folder

    cd Crud-Cursos

Install all the dependencies using composer

    composer install

Install the dependencies using npm 

    npm install 

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the following command

    npm run dev

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

Run the database seeder and you're done

    php artisan db:seed