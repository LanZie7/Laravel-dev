FROM phpdockerio/php74-fpm:latest
WORKDIR /lana

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php-memcached php7.4-mysql php7.4-pgsql php-redis php7.4-sqlite3 php-xdebug php7.4-bcmath php7.4-bz2 php7.4-dba php7.4-enchant php7.4-gd php7.4-gmp php-igbinary php-imagick php7.4-imap php7.4-intl php7.4-ldap php-mongodb php-msgpack php7.4-soap php-ssh2 php7.4-sybase php-tideways php7.4-tidy php7.4-xmlrpc php7.4-xsl \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

EXPOSE 6007
