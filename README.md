# 6g-cherry-team-server

## Project Setup

1.  start `docker-compose`

    ```
    $ docker-compose up -d
    ```

2.  create `.env` file

    ```
    $ cp .env.example .env [ For mac OS]

    copy .env.example to .env [ For window OS]
    ```

<!-- 3.  install composer
    ```
    $ docker-compose exec php-fpm composer install
    ``` -->

## Database

1.  migrate database

    ```
    $ docker-compose exec php-fpm php artisan migrate
    ```

2.  seeding database

    ```
    $ docker-compose exec php-fpm php artisan db:seed
    ```

3.  access database

    ```
    localhost:8888
    ```
