# Categories test

Implementation test for dynamic categories.

## Setup

Add to `.bashrc`

```
export DOCKER_USER_UID=$(id -u)
export DOCKER_USER_GID=$(id -g)
```

```shell script
$ composer install
$ cp .env.example .env
$ docker-compose up -d --build

$ docker-compose exec app bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```
