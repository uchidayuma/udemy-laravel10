# PHP FPM をベースイメージとして使用
FROM php:8.2-apache

# 作業ディレクトリの設定
WORKDIR /var/www
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

# Laravel 依存関係のインストール
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# PHP 拡張機能のインストール
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer のインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravel アプリケーションのコピー
COPY . /var/www
COPY simple-swarm/cook80.conf /etc/apache2/conf-enabled/cook80.conf

# Composer 依存関係のインストール
ENV COMPOSER_ALLOW_SUPERUSER 1 
RUN composer install

# 権限の設定
RUN chown -R www-data:www-data /var/www

# ポートの公開
EXPOSE 9000
