# Media Info

A media info web application for interesting movie reviews.

## How It Works

- Guest visitors: 
  - browsing different categories of movies;
  - view user comments;
- Logged Users:
  - can add a new movie; 
  - can write comments for any movie;

## Built With

- Lavavel 9
- Eloquent ORM 
- MySQL
- Blade Templates, Partial Views
- Dependency Injection
- Status Code Pages Middleware
- Sorting, Filtering, and Paging
- Data Validation, both Client-side and Server-side
- Responsive Design
- Bootstrap
- JavaScript
- JQuery
- HTML
- CSS

## Application Configurations

### 1. Application Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### 2. Create Application Encryption Key 
if an error occurs, you must generate an encryption key in .env file.Click button generate in the browser.

### 3. Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```
### Seeding The Database
To add base data in the database, run the following
```
php artisan db:seed
```