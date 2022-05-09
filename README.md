## Discount Exchange
an elegant API driven discounts exchange manager.


## How to set up the application on your machine ?!

_You can watch the quick video I attached below or go over the following steps_

### Quick 🏃 Video

- https://www.loom.com/share/c224b435be9f4e449173cd9397e4a469

### Requirements
- Composer
- Docker desktop

<br>

### Steps in order ✨

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

#### Watch the quick setup Video 🚀 🎥

- https://www.loom.com/share/c224b435be9f4e449173cd9397e4a469


<hr>

### Testing 🔬🧪

- I'm using the PEST framework, you can easily run all the feature tests by running the following command

```
./vendor/bin/sail test
```

<hr>

## API EndPoints 🦾 🚀

- The API collection is committed to the repo with the file name of [ *api_collection_Insomnia_2022-05-09.json* ]

<br>

### 1) Brand Create Coupon

- __Group__: Brand
- __Prefix__: /api/v1/brand
- __Endpoint__: /coupons
- __Method__: POST
- __Full URI__: example-site.test/api/v1/brand/coupons
- __Authorization__: OAuth2,Bearer token, User Access tokens

#### Parameters & Data Types

- [Full system design map](https://whimsical.com/system-design-7c7i7qT7WVCGHKeK27Roc3)

#### Request body JSON [Example]
```
{
	"name":"coupon_3",
	"brand_id":1,
	"percentage":29,
	"percentage_max_rate":10,
	"max_redemptions":1000,
	"max_discount_codes":1000,
	"discount_code_max_length":12,
	"currency":"usd",
	"discount_code_type":"random_string",
	"trigger":"customer_created",
	"expires_at":"2022-05-31 11:00:00"

}
```

#### CURL CALL

```
curl --request POST \
  --url http://discountexchange.test/api/v1/brand/coupons \
  --header 'Accept: application/json' \
  --header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NjQwZTdiNC03MDRmLTRlZGMtOTRkOC1mNTZhODkxNmIwOGQiLCJqdGkiOiIyMGU4ODRjMzg2YzQ4ZGQwZTJhZTI4NWEzZjhmYzllMmZjMzVhZTdkZWIxMmVhMTgzYWRkODBiMTIyYjlkYmY3NzhmNzExOTViZDQwMDExMyIsImlhdCI6MTY1MjA1NTE0Mi45MjkyMywibmJmIjoxNjUyMDU1MTQyLjkyOTIzOSwiZXhwIjoxNjgzNTkxMTQyLjgzNjIyNiwic3ViIjoiMSIsInNjb3BlcyI6W119.fru2CxpNSlJl6X_TQXghpDBXWONMVKZFFgfgMZnDztdhN-2VzR5d-606PKeMf1GUSlT1BO9Cw-AJN__m5xohPNW6jwNyVI1L4pUm2fA3UU62Cjrt_BmPh_iB5X-GzSh1M0ut3ktGxB01kCDg_xIr2tiVf9TOl-H2uZOJLbSSovvJzcUWqwA5ASeyNT6vXu4zLmIDOxI0VuFCpdnrQ253sCv-9khpXNE9GXWzJrTKFinUKBs5IEpPukcbZaaPYZCBF8CBOKo83sKIiasgm01OsfaihhntWLbOGFx-FeU9oLUAaJSN0h1Nujq0VMoTQNsmpriYiq1mg0JyxSKSEXmlEOldv68vvQS9DKdzfJVXmvzceVZEG1p3rxlCS5DG_qO3L69ymdbrcSfBsIUMCxoj4QGd1hFKiOYVAyFvtiGdfNhCG_PfyHaQREpTiAmb9zJyD1ZpNR5l41kIpx6Tg5cn0JKWtSjshjxRlJX_Fi_T1Wb-GPq-uwiA7fLBIlSMo0rMRjuPICwuHGtbMhlQzijqtDXLTKwuweaHozEjPOoOR9aXZsmNCmg0z6gllCNPMHBNNvOK5APeDA15L56xi-Y-1SD8jmdssyQI5AAa7sceKELcEXu4SkEh-WYDbzPY5aSZU4A6HHvqIXUDmC0LkTktyPsiW7t9_PE2BCuH7vhTm6Y' \
  --header 'Content-Type: application/json' \
  --data '{
	"name":"coupon_3",
	"brand_id":1,
	"percentage":29,
	"percentage_max_rate":10,
	"max_redemptions":1000,
	"max_discount_codes":1000,
	"discount_code_max_length":12,
	"currency":"usd",
	"discount_code_type":"random_string",
	"trigger":"customer_created",
	"expires_at":"2022-05-31 11:00:00"

}'
```

<hr>



### 2) User get discount

- __Group__: User
- __Prefix__: /api/v1/user
- __Endpoint__: /discounts
- __Method__: POST
- __Full URI__: example-site.test/api/v1/user/discounts
- __Authorization__: OAuth2,Bearer token, User Access tokens

#### Parameters & Data Types

- [Full system design map](https://whimsical.com/system-design-7c7i7qT7WVCGHKeK27Roc3)


#### Request body JSON [example]
```
{
	"coupon_id":3,
	"brand_id":2
}
```

#### CURL CALL

```
curl --request POST \
  --url http://discountexchange.test/api/v1/user/discounts \
  --header 'Accept: application/json' \
  --header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NjQwZDA0YS0zMzU1LTQxMGUtYTBiZS03YmY4YmI4OWZlNDMiLCJqdGkiOiI4ZDQ5YjgyOWNmMmYzODZhYWQzNjdkYzM5ZmViMmFmZDczOGU2NzMwNGIzNzhiNGMzMjhiNTQ5NGIxNDE2YzU0ODdkNjBkNjZkMDIwODhmMSIsImlhdCI6MTY1MjA1MTE4My4zMzgzMjcsIm5iZiI6MTY1MjA1MTE4My4zMzgzMzMsImV4cCI6MTY4MzU4NzE4My4zMDQzNzUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.TdTDfMyC_hPsS8eCtvBpHEkD5L63clf8vfix75tkvPKzl9wMjYlLXJiaPh1mT3-chyE1NshfeOi41smkigFfZsV1K5G1xTPMF4XjPldKCZQiLzzMZjhbm7WyIHtTIGHlJwgfQSFPg3lU9fHWhM_bzUcKeAilqt7WCXZCJyNxHEj0o5EEhFQgGFvmgaF3XMfyPEsUoiiyrB0PU3UnxUCc_tosHWyHKIU_hLLarpe9teGgDniBFJRHPRQirlACFTty5CjIYb2crMwFevywou-3Ru9HxIDV10F5J2w3PlIHsO-c8nkoBjNfzswO1Di38ZVqSUjVp8DQqcHBe4GJTIQig7ZEA-2KAuwaBFhBueft0Wbh4cm6NOYfDpARCHN5ipGQBAefsjYsuEYidrDBY41CurmjLyfOtQM8dWAs0VO30JGKuK5Y_ny3fFVQvfnGVxfEdDyr7uoyzWp6hvf7UW_mAyol2jSWMFa52h2plSK0U8yNJMg0xREt9GQZWljK1l2CNKkWqmxNe7zfQAKOmX9MX8FxHqaItv29Sn-VXYV-BzEOJa2Dv8O-51x47Sx6WIuJpNrP29j3qOcfKYG2L28Gh6x0x7Z3MZ28lfRt5njN-_VjLZHX7cZ3wf5Y7m4Z2egpVcXoUmHyusvkuN26T3ve_ljLAwb1kKcNSPiUWk8KNAA' \
  --header 'Content-Type: application/json' \
  --data '{
	"coupon_id":3,
	"brand_id":2
}'
```

<hr>


### 3) User login and exchange token

- __Group__: Auth
- __Prefix__: oauth
- __Endpoint__: /token
- __Method__: POST
- __Full URI__: example-site.test/oauth/token
- __Authorization__: Password Grant Access

#### Request body JSON [example]
```
{
	"grant_type" : "password",
    "client_id" : "9640e7b4-704f-4edc-94d8-f56a8916b08d",
    "client_secret" : "gVOuVsJrffFaR83bzVju7JIEaDPRM6cSGSbZFGWV",
    "username" : "user1@users.com",
    "password" : "password",
    "scope" : ""
}
```

#### CURL CALL

```
curl --request POST \
  --url http://discountexchange.test/oauth/token \
  --header 'Content-Type: application/json' \
  --data '{
		"grant_type" : "password",
    "client_id" : "9640e7b4-704f-4edc-94d8-f56a8916b08d",
    "client_secret" : "gVOuVsJrffFaR83bzVju7JIEaDPRM6cSGSbZFGWV",
    "username" : "user1@users.com",
    "password" : "password",
    "scope" : ""
}'
```

<hr>

## System Design snapshot

image

<hr>
_Thanks for your time_ 👋 <br>
_Mina_
