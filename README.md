## Discount Exchange
an elegant API driven discounts exchange manager.
<hr>

## How to set up the application on your machine ?!

_You can watch the quick video I attached below or go over the following steps_

### Requirements
- Composer
- Docker desktop

### Steps in order

#### 1) Clone the repo to your machine
```
git clone https://github.com/M-Farag/discountExchange.git
```

#### 2) Go to the cloned directory and run composer install
```
cd discountExchange
composer install
```

#### 3) Copy & create the new .env file
```
cp .env.example .env
```

#### 4) open and edit the DB section in the .env file using any text editor 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=discount_exchange
DB_USERNAME=sail
DB_PASSWORD=password
```

#### 5) generating a new API key
```
php artisan key:generate
```

#### 6) booting up the docker env using laravel sail
- **Please note you must shutdown any local webservers and database server before starting sail**
```
./vendor/bin/sail up
```

#### 7) run the following commands in order
```
./vendor/bin/sail artisan migrate:fresh
./vendor/bin/sail artisan db:seed --class=BootUpSeeder
```

#### 8) run this command and save the results on a safe place
```
./vendor/bin/sail passport:install
```

<hr>

#### Watch the quick setup Video 

https://www.loom.com/share/c224b435be9f4e449173cd9397e4a469


<hr>

### Testing

- I'm using the PEST framework, you can easily run all the feature tests by running the following command

```
./vendor/bin/sail test
```

<hr>
