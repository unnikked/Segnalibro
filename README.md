# Segnalibro

<p align="center"><img src="public/apple-icon.png"/></p>

Save and comment your preferite links from the web. It's just a bookmarking application.

Built with Laravel 5.5

# Documentation

### Install

```
git clone https://github.com/unnikked/Segnalibro.git
cd Segnalibro
composer install
cp .env.example .env
php artisan key:generate
```

Now configure your database, for a quick run use SQLite. Edit your .env file with

```
DB_CONNECTION=sqlite
# delete the rest DB_ related entries
```

And create the database and migrate

```
touch database/database.sqlite
php artisan migrate
```

Serve it with `php artisan serve`.
