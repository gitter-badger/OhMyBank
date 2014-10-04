# Vagrant

## Dependencies

You will need to have [ansible](http://www.ansible.com/home) installed.

## Description

This configuration includes following software:

* Debian 7
* Apache
* PHP FPM
* PHP 5.5
* HHVM
* Composer
* MariaDB
* node.js with Grunt and Bower

## MariaDB

* user : dev
* password : ij86EEg9

# Usage

First you need to create vagrant VM

```
$ cd vagrant
$ vagrant up
```

Then go to ohmybank.dev/

# Logs and cache

```
$ tail -f /dev/shm/ohmybank/app/logs/prod.log
$ tail -f /dev/shm/ohmybank/app/logs/dev.log
```