FROM php:7.4.29-fpm-buster

WORKDIR /data01

# 设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y \
        --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev curl net-tools iputils-ping vim procps telnet libreoffice\
        && rm -r /var/lib/apt/lists/* \
        && docker-php-ext-configure gd  --with-freetype --with-jpeg\
        && docker-php-ext-install -j$(nproc) gd opcache pdo_mysql gettext sockets zip bcmath

# 安装 PECL 拓展，安装Redis，swoole
RUN pecl install redis \
#    && pecl install swoole \
    && pecl install xdebug \
    && pecl install zip \
    && docker-php-ext-enable redis xdebug zip

# 安装composer , 替换国内源
RUN php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
    && composer selfupdate



