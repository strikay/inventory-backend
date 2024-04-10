# Inventory API (Laravel)

Inventory API is a (REST) Laravel Application Programming Interface which allows consumers for the API to digitally manage their inventory using a digital database. Frontend Libraries and Frameworks can connect to the API via designated API endpoints which follow the CRUD style of all REST APIs.

## Installation

Download and configure latest version of XAMPP to work on the project

Clone this project by running the git clone command
```bash
git clone REPOSITORY_URL
```
Navigate to the project directory
```bash
cd inventory-backend
```

Use the package manager [composer](https://getcomposer.org/download/) to install all the packages in the project.

```bash
composer install
```

Use the package manager [npm](https://getcomposer.org/download/) to install all the Javascrip packages in the project.

```bash
npm install
```
Create a database called "inventory" via MySQL dashboard, which can be opened by opening XAMPP and clicking admin button adjacent to MySQL.


## Usage

To create tables in the database run
```bash
php artisan migrate
```
To populate the tables with seed data run 
```bash
php artisan db:seed
```
To start the Laravel API server run
```bash
php artisan serve
```
The project should start and display the {BASE_URL} i.e. the IP Address it is running on, e.g. http://127.0.0.1:8000

The project features the following endpoints which can be tested via Postman:
1.{BASE_URL}/api/items

2.{BASE_URL}/api/items/remove/{id}

3.{BASE_URL}/api/items/restock/{id}

4.{BASE_URL}/api/login

5.{BASE_URL}/api/register


## License

[MIT](https://choosealicense.com/licenses/mit/)