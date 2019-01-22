# Symfony 4 forum application

Installation
------------

To install this project, run the commands below:


```
composer install
```

To create database

```
php bin/console doctrine:database:create
```

To create database schema

```
php bin/console doctrine:schema:update --force
```

To install Fixtures

```
php bin/console doctrine:fixtures:load
```
