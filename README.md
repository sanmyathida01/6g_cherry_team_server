# pjbase-server

## Project Setup

1.  start `docker-compose`

    ```
    $ docker-compose up -d
    ```

## Database

1.  access database

    ```
    localhost:8888
    ```

<!-- 1.  create `.env` file

    ```
    $ cp .env.example .env [ For mac OS]

    copy .env.example to .env [ For window OS]
    ```

1.  install composer
    ```
    $ docker-compose exec php-fpm composer install
    ```

## Database

1.  migrate database

    ```
    $ docker-compose exec php-fpm php artisan migrate
    ``` -->
