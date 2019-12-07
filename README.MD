# Bicycle shop
 A project made using vanilla PHP, MySQL , HTML, CSS.

### The project support:
1) User Registration and Login system using Cookies for User and Sessions for Administrator, 
2) Full CRUD support,
3) Sorting Bicycle Posts by Criterias,
4) Pagination in the Admin Panel. 


# Setup Instruction
1. Install WAMP (or LAMP, XAMP, MAMP).
2. Copy the project directory in the `../htdocs` folder in WAMP directory.
3. Create a new databse with the name  `bicycle_warehouse`.
4. Import Database `bicycle_warehouse.sql`, collation - utf8_general_ci located in the project folder.
4. Set the credentials to the Database. Enter credentials in the file `db_credentials.php` located in `../content-iro-php-master/private/db_credentials.php`.
5. Set absolute path to the captcha fonts.
- Open file `captcha_verification_code.php` located in `.../content-iro-php-master/public/staff/captcha_verification_code.php`.
- Add absolute path to the `$font="ABSOLUTE PATH TO THE FONT"`;
 Fonts are located in `../content-iro-php-master/public/font/`.


## Default Users after importing the Database
|  Type          |  User Name             |     Password        |
|----------------|------------------------|---------------------|
| Admin		     |   great.admin          |     Great.admin1    |
| Admin          |   best.admin           |     Best.admin123   |
| User           |  `pawel.rotar`         |     Pawel.rotar1  	|
| User		     |   temp.user            |     Temp.user123    |