# pjbase-server

## Project Setup

1.  start `docker-compose`

    $ docker-compose up -d

1.  create `.env` file

    $ cp .env.example .env [ For mac OS]  
    copy .env.example to .env [ For window OS]

1.  install composer

    $ docker-compose exec php-fpm composer install
