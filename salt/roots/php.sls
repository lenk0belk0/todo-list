software-properties-common:
  pkg.installed

php:
  pkgrepo:
    - managed
    - ppa: ondrej/php
    - require:
      - software-properties-common
  pkg:
    - name: php7.4
    - installed

php-fpm:
  pkg:
    - installed
    - require:
      - pkg: php

php-mysql:
  pkg:
    - installed
    - require:
      - pkg: php

php-xml:
  pkg:
    - installed
    - require:
      - pkg: php

php-mbstring:
  pkg:
    - installed
    - require:
      - pkg: php

php-curl:
  pkg:
    - installed
    - require:
      - pkg: php

php-xdebug:
  pkg:
    - installed
    - require:
      - pkg: php

get-composer:
  cmd.run:
    - name: 'CURL=`which curl`; $CURL -sS https://getcomposer.org/installer | php'
    - unless: test -f /usr/local/bin/composer

install-composer:
  cmd.wait:
    - name: mv /root/composer.phar /usr/local/bin/composer
    - watch:
      - cmd: get-composer

/home/vagrant/api:
  composer.installed:
    - require:
      - cmd: install-composer
