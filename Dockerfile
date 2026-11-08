FROM php:8.3-cli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json ./
RUN composer install --no-dev --optimize-autoloader

COPY . /app

CMD php -S 0.0.0.0:$PORT -t /app/public