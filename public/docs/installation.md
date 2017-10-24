# Requirements

Segnalibro uses Laravel 5.5. Official requirements are:

- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation (production)

To install Segnalibro, start by cloning the repository to your webroot.

```
git clone https://github.com/unnikked/Segnalibro.git
```

After cloning `cd` into the Segnalibro main directory and issue:

```
composer install --no-dev
```

After that, make sure to create the `.env` file.

```
cp .env.example .env
```

Edit the `.env` file according to your custom settings.

Generate the application key with:

```
php artisan key:generate
```

Migrate the database:

```
php artisan migrate
```

Install passport for API authentication:

```
php artisan passport:install
```

Hit your homepage URL.

### Custom options

If you are not serving Segnalibro behind a proxy or a load balancer, but you want to enable HTTPS place this in your `.env` file:

```
FORCE_SSL=true
```
