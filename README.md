## Using Elasticsearch in a Laravel Application

A demo to illustrate how to use Elasticsearch within a Laravel application.

![](https://raw.githubusercontent.com/stevepop/es-laravel/master/public/images/books.png)

## Installation

Clone the repo

```sh
git clone https://github.com/stevepop/es-laravel.git
cd es-laravel
```

Install PHP dependencies:

```sh
composer install
```

Install frontend dependencies

```sh
npm install or yarn install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (ie MySQL), just ensure you update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Load Books from Books.json

```sh
php artisan books:load
```

Start Elasticsearch with docker (Ensure you have Docker installed on your machine)

```sh
docker-composer up
```

Index books data into Elasticsearch

```sh
php artisan search:es:index
```

Start your dev server

```sh
php artisan serve
```

Or if using Valet

```sh
valet link
```

Go the the browser and load the page. Try searching for a book. You can switch between searching with Elasticsearch and searching with SQL by changing the value of ELASTICSEARCH_ENABLED
