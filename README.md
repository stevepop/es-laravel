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

Start Elasticsearch with docker (Ensure you have Docker installed on your machine)

```sh
docker-composer up
```

Load Books from Books.json. This also indexes the records in Elasticsearch.

```sh
php artisan books:load
```

If you encouter 'too many files open error', temporarily increase your ulimit.
`ulimit -n 1000`

Start your dev server

```sh
php artisan serve
```

Or if using Valet

```sh
valet link
```

Go the the browser and load the page. Try searching for a book. You can switch between searching with Elasticsearch and searching with SQL by changing the value of ELASTICSEARCH_ENABLED

## Acknowledgments

Referenced links;

https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html

https://madewithlove.com/how-to-integrate-elasticsearch-in-your-laravel-app-2019-edition/
