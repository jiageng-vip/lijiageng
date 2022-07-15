FROM php:7.4.29-fpm-buster

WORKDIR /data01

# 设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y \
        --no-install-recommends cron libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev curl net-tools iputils-ping vim procps telnet supervisor\
        && rm -r /var/lib/apt/lists/* \
        && docker-php-ext-configure gd \
        && docker-php-ext-install -j$(nproc) gd opcache pdo_mysql gettext sockets zip

# 安装 PECL 拓展，安装Redis，swoole
RUN pecl install redis \
    && docker-php-ext-enable redis

# 安装composer , 替换国内源
RUN php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ \
    && composer selfupdate

ADD ./cron.d/root /var/spool/cron/crontabs/root

# 修改文件的权限，必须为 600，否则不认 && # 创建 log 文件
RUN chown -R root:crontab /var/spool/cron/crontabs/root \
    && chmod 600 /var/spool/cron/crontabs/root \
    && sed -i '9i\CRON_TZ=Asia/Shanghai' /etc/crontab \
    && touch /var/log/cron.log