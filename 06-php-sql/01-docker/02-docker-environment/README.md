# DEV env: docker-compose

You have now installed Docker on your computer. Congratulations ! 🥳 Now we will present you your homemade environment. 

But firstly, if you are completely new to Docker we recommend you to read the [Docker Survival Guide](https://github.com/becodeorg/cli/tree/develop/docs/docker-survival-guide).

## The environment is here

Have a look at this repo => [DOCKER ENVIRONMENT](https://github.com/Broodco/php_docker_mysql_template).

To start working on a PHP-MySQL app, you can use this template. Instructions on how to use it are in the README.

You have 1 important file & 2 folders inside :
- docker-compose.yml
- src
- phpdocker

The `docker-compose.yml` is the configurations file in order to run your containers.

The `src` folder is your work environment folder where you will code your PHP files. There is already a `index.php` in it.

The `phpdocker` docker where the configuration of your server lives. There are explanations about the environment & how to use it.

## Run `docker`

When starting your env for the first time, run the following command in your repo:

	docker compose build

> **NOTE:** thus you don't need to run this command each time, it may be useful to *re*build your services when you change the configuration of your services.

Then, simply run the following command to get started:

    docker compose up

The details for all your services is detailed [HERE](https://github.com/Broodco/php_docker_mysql_template/tree/main/phpdocker).

## Your services

### Langage: PHP

#### What is PHP?

PHP is a server-side scripting language designed for web development, but which can also be used as a general-purpose programming language. 
PHP can be added to straight HTML, or it can be used with a variety of templating engines and web frameworks. 
PHP code is usually processed by an interpreter, which is either implemented as a native module on the web-server or as a common gateway interface (CGI).

* **Website:** [php.net](http://php.net)
* **Documentation:** [php.net/docs.php](http://php.net/docs.php)

#### Container

* **Image used:** [phpdockerio/php:8.1-fpm](https://github.com/phpdocker-io/base-images/blob/master/php/8.1/Dockerfile)

##### Usage

Place your PHP files in `./src` folder, access it with your browser at address [localhost:3000](http://localhost:3000).

*Note* : for now, you can only access files located in the `./src/public` directory, and this is normal. The configuration
of this development environment "hides" any files located outside the *public* directory for security purposes. You will learn
more about this later in the php path.

* * *

### Database: MySQL

#### What is MySQL?

MySQL is an open-source relational database management system used to work with *relational databases*.

* **Website:** [mysql.com](https://www.mysql.com/)
* **Documentation:** [dev.mysql.com/doc/refman/8.0/en/](https://dev.mysql.com/doc/refman/8.0/en/)

#### Container

* **Image used:** [mysql](https://hub.docker.com/_/mysql)

##### Usage

**IMPORTANT:** the first startup of this container is long : the db server needs to be initialized.

**NOTE:** the container will create a default database (php-playground) at startup. You can either create another one yourself using the
command-line interface, or a tool like _phpmyadmin_, which we will see in more details afterwards.

###### Access from another container

You can access the database **from another container** with the following informations:

* **host:** `mysql`
* **port:** `3306`
* **user:** `playground-user`
* **pass:** `playground-pass1234`

###### Access from your host

You can access the database  **from you host** with the following informations:

* **host:** `localhost`
* **port:** `3306`
* **user:** `playground-user`
* **pass:** `playground-pass1234`


* * *

### Tool: phpMyAdmin

#### What is phpMyAdmin?

A web interface for MySQL and MariaDB.

* **Website:** [phpmyadmin.net](https://www.phpmyadmin.net/)
* **Documentation:** [phpmyadmin.net/docs](https://www.phpmyadmin.net/docs/)

#### Container

* **Image used:** [phpmyadmin/phpmyadmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)

##### Usage

The container is already configured to use the MySQL/MariaDB credentials, but you can update those in the docker-compose file.
Access **phpMyAdmin** with your browser at address [localhost:8080](http://localhost:8080).
