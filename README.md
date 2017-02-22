![codeship](https://app.codeship.com/projects/5ee641e0-ce5e-0134-642a-1a032757f589/status?branch=master)
# Set up

```
composer install -d ./laravel
cp ./laravel/.env.example ./laravel/.env
php ./laravel/artisan key:generate

docker-compose up -d
```

Check & Access

http://localhost


# License
[MIT license](https://opensource.org/licenses/MIT)
