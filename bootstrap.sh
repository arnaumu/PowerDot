#!/bin/sh

apt-get update

apt-get install -y php
apt-get install -y php-mysql

systemctl restart apache2