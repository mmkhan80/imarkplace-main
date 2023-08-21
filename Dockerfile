
FROM php:7.4-apache

# Note: php:7-apache is a debian based image.
# Note: mycrypt extension is not provided with the PHP source since 7.2.
#       Instead it is available through PECL. 
#       To install a PECL extension in docker, 
#          use `pecl install <packagename-version>` to download and compile it, 
#          then use `docker-php-ext-enable` to enable it:
#RUN apt install apache2 utils -y
RUN apt-get update && apt-get install -y \
      libmcrypt-dev \
      libfreetype6-dev \
      libjpeg-dev \
      libpng-dev \
      libxml2-dev \
      libtidy-dev \
      libxslt-dev \
      libc-client-dev libkrb5-dev \
      libicu-dev \
      libldb-dev libldap2-dev \
      libgmp-dev \
      libbz2-dev \
      libzip-dev libfreetype6-dev \
      libpcre3-dev \
      libwebp-dev \
      libjpeg62-turbo-dev \       
      libxpm-dev \     
    && a2enmod rewrite expires \
#    && pecl install mcrypt-1.0.1 \
    && docker-php-ext-install mysqli opcache iconv bcmath gettext soap sockets tidy xmlrpc xsl pdo_mysql exif intl ldap pcntl gmp bz2 calendar zip \    
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap intl \

RUN set -eux; \
	docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp; \
	docker-php-ext-configure intl; \
	docker-php-ext-configure mysqli --with-mysqli=mysqlnd; \
	docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd; \
	docker-php-ext-configure zip; \
	docker-php-ext-install -j "$(nproc)" \
		gd \
		intl \
		mysqli \
		opcache \
		pdo_mysql \
		zip




RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer
