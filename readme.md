# _Shoe store website for PHP w/ Silex, Twig, PHPUnit, and SQL_

#### _A basic shoe website, 2.26.2016_

### By _**Marika Allely**_

## Description

_This web app is designed to allow users to create shoe stores and shoe brands. The app was built using the micro-framework Silex, PHP, Twig, and Bootstrap._

_The goal of this code review is to show basic understanding and competency with many to many relationships in SQL, PHP, and the Silex micro-framework._


## Setup/Installation Requirements

1. Fork and clone this repository from [gitHub](https://github.com/MBAllely/shoes).
2. In the terminal, navigate to the root directory of the project and run the command: __composer install__ .
3. In the terminal, start SQL by running the command: __mysql.server start__, and then run the command __mysql -uroot -proot__ .
4. In another terminal tab, start Apache by running the command __apachectl start__ .
5. In your browser, navigate to __localhost:8080/phpmyadmin__ . Click the Import tab, choose the file for _shoes.sql_ in the _shoes_ project folder, and press go.
6. On a mac: Create a local server in the /web directory within the project folder  the command: __php -S localhost:8000__ .  On a windows, shrug.  Sorry, hoss.
7. Open the directory http://localhost:8000 in any standard web browser. (#chrome4lyfe)

## IF YOU NEED TO CREATE THE DATABASE

1. If you haven't already: In the terminal, start SQL by running the command: __mysql.server start__, and then run the command __mysql -uroot -proot__.
2. Run the command __CREATE DATABASE shoes;__ .
3. Use the database by running the command __USE shoes__ .
4. Create the __stores__ table by running the command __CREATE TABLE stores (store_name TEXT, phone TEXT, id serial PRIMARY KEY);__ .
5. Create the __brands__ table by running the command __CREATE TABLE brands (brand_name TEXT, phone TEXT, id serial PRIMARY KEY);__ .
6. Create the __store_brand__ table by running the command __CREATE TABLE store_brand (store_id INT, brand_id INT, id serial PRIMARY KEY);__ .
7. In your browser, navigate to http://localhost:8080/phpmyadmin.  The username is __root__ and the password is __root__.
8. Click on the _shoes_ database.
9. Click on the _Operations_ tab
10. Under _Copy database to_, name the copy __shoes_test__, select _Structure only_, unselect _Add contraints_ and _Adjust privileges_, then click _Go_.

## Known Bugs

None.

## Support and contact details

If you have any questions, concerns, or feedback, please contact me through [gitHub](https://github.com/MBAllely/).
Or send me weird photos, like cats wearing socks.  I like those.

## Technologies Used

This web application was created using:
HTML, CSS, [Bootstrap](http://getbootstrap.com/), [Silex](http://silex.sensiolabs.org/),
[Twig](http://twig.sensiolabs.org/), [mySQL](https://www.mysql.com/),
and tested with [PHPUnit](https://phpunit.de/).

### License

This software is licensed under the MIT License.

Copyright (c) 2016 **_Marika Allely_** (our lord and savior)
