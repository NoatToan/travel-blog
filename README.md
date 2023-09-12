## Run Unit Test

    docker-compose exec php bash
    php -dxdebug.mode=coverage vendor/bin/phpunit --coverage-clover='reports/coverage/coverage.xml' --coverage-html='reports/coverage'

## Run Unit Test with Coverage Reports

    docker-compose exec php bash
    php artisan test

