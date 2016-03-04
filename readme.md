# _Hair Salon for PHP w/ Silex, Twig, PHPUnit, and SQL_

#### _A basic hair salon website, 2.26.2016_

### By _**Marika Allely**_

## Description

_This web app is designed to allow users to create stylists and clients. The app was built using the micro-framework Silex, PHP, Twig, and Bootstrap._

_The goal of this code review is to show basic understanding and competency with SQL, PHP, and the Silex micro-framework._


## Setup/Installation Requirements

1. Fork and clone this repository from [gitHub](https://github.com/MBAllely/hair_salon_php).
2. In the terminal, navigate to the root directory of the project and run the command: __composer install__ .
3. In the terminal, start SQL by running the command: __mysql.server start__, and then run the command __mysql -uroot -proot__.
4. In another terminal tab, start Apache by running the command __apachectl start__.
5. In your browser, navigate to __localhost:8080/phpmyadmin__. Click the Import tab, choose the file for hair_salon.sql in the hair_salon_project folder, and press go.
6. On a mac: Create a local server in the /web directory within the project folder  the command: __php -S localhost:8000__.  On a windows, shrug.  Sorry, hoss.
7. Open the directory http://localhost:8000 in any standard web browser. (#chrome4lyfe)

## Known Bugs

_When a stylist is edited, the clients don't appear on the page unless another client is added.  Eh._

_Oh, and the CSS doesn't work on all the pages.  But that's for the front end nerds (dear front end nerds: please fix my pages)._

## Support and contact details

_If you have any questions, concerns, or feedback, please contact me through_ [gitHub](https://github.com/MBAllely/).
_Or send me weird photos, like cats wearing socks.  I like those._

## Technologies Used

_This web application was created using:
HTML; [Bootstrap](http://getbootstrap.com/); CSS; [Silex](http://silex.sensiolabs.org/);
[Twig](http://twig.sensiolabs.org/), a template engine for php; [mySQL](https://www.mysql.com/)
and tested with [PHPUnit](https://phpunit.de/)._

### License

This software is licensed under the MIT License.

Copyright (c) 2016 **_Marika Allely_** (our lord and savior)
