# Laravel 10 CRUD with Livewire

This repository contains a basic CRUD (Create, Read, Update, Delete) application built with Laravel 10 and Livewire. It demonstrates how to perform dynamic interactions and data manipulation using Livewire components within a Laravel application.

## Features

- **Create**: Add new items to the database.
- **Read**: Display a list of items and view details of each item.
- **Update**: Edit existing items and update their information.
- **Delete**: Remove items from the database.

## Prerequisites

Before getting started, make sure you have the following installed:

- PHP >= v8.2.4
- Composer >= v2.5.5
- Node.js >= v20.11.0 and NPM >= 10.5.0
- Laravel 10 (installed globally or locally)

## Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/sulitjomar/laravel11-crud-livewire.git
   ```

2. Navigate into the project directory:
   
   ```bash
   cd laravel11-crud-livewire
   ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install NPM dependencies:

    ```bash
    npm install
    ```

5. Copy the .env.example file to .env and configure your database connection:

    ```bash
    cp .env.example .env
    ```

6. Migrate database

    ```bash
    php artisan migrate
    ```

7. Generate an application key:

    ```bash
    php artisan key:generate
    ```

8. Run the project:

    ```bash
    php artisan serve
    ```