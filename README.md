![codeship](https://app.codeship.com/projects/5ee641e0-ce5e-0134-642a-1a032757f589/status?branch=master)
[![Build Status](https://travis-ci.org/hanhan1978/docker-laravel54-skelton.svg?branch=master)](https://travis-ci.org/hanhan1978/docker-laravel54-skelton)
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
