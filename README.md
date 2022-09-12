## Installation

Clone the repository-
```
git clone git@github.com:Enigmatec/toheeb-callphone.git
```

Then cd into the folder with this command-
```
cd toheeb-callphone
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env or create a file and name it .env and copy the content the of .env.exmaple into it
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then generate a key using this command
```
php artisan key:generate
```

Then create a database named `callphone_db` and then do a database migration using this command-
```
php artisan migrate
```

## Run server

Run server using this command-
```
php artisan serve
```
## Postman API Documentation Link
https://documenter.getpostman.com/view/16200299/2s7YYr6ix7






