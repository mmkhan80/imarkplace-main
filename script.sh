#!/bin/bash
systemctl stop apache2
systemctl stop nginx
systemctl stop mysql
systemctl stop elasticsearch
apt update
apt upgrade
apt install docker.io
apt install curl
apt install docker-compose
groupadd docker
usermod -aG docker $USER

change_group () {
	group=docker
	if [ $(id -gn) != $group ]; then
  		exec sg $group "$0 $*"
	fi
}

change_php_version () {
    local IS_PHP7=`php --version|grep "PHP 7.4"`

    if [[ -z $IS_PHP7 ]]; then
        echo "Changing PHP Version to 7.4"
        sudo a2dismod php7*;
        sudo a2enmod php7.4;
#        sudo systemctl restart apache2;
        sudo ln -sfn /usr/bin/php7.4 /etc/alternatives/php
    else
        echo "Not found PHP 7"
    fi
}

change_group
change_php_version
docker-compose -f docker-compose.yml up -d
export COMPOSER_ALLOW_SUPERUSER=1
composer self-update --2
composer update
composer install

php bin/magento setup:install --base-url=http://imark.local --db-host=192.168.55.10 --db-name=imarkdb --db-user=root --db-password=rootimark123 --admin-firstname=Magento --admin-lastname=User --admin-email=user@example.com --admin-user=admin --admin-password=admin123 --elasticsearch-host=192.168.55.11 --elasticsearch-port=9200 --elasticsearch-username=magento --elasticsearch-password=magento

php bin/magento setup:upgrade && php bin/magento setup:di:compile && php bin/magento setup:static-content:deploy -f && php -d memory_limit=4G bin/magento i:reset && php -d memory_limit=4G bin/magento i:reindex && php bin/magento c:e && php bin/magento c:f && php bin/magento c:c && sudo chmod -R 777 var/ generated/ pub/static


