To upgrade your own copy of Segnalibro, simply pull changes from the repo:

```
git pull
```

Then migrate your database:

```
php artisan migrate
```

### Note

You will pull changes from the `master` branch, which is still highly unstable. Do make a backup of your data before upgrading.
