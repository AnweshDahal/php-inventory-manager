# Clausia Inventory Manager

!['img'](https://img.shields.io/static/v1?label=language&message=PHP&color=blue) ![](https://img.shields.io/static/v1?label=database&message=MySQL&color=red) ![](https://img.shields.io/static/v1?label=version&message=N/A&color=success) ![](https://img.shields.io/static/v1?label=stylesheet&message=SASS&color=orange)

## Description

A simple Inventory Management webapplication built using PHP and MySQL.

## Installation

Requires XAMPP or similar software, the instructions are set according to XAMPP' method

1. Download the project's zip folder.
2. Copy the contents into the htdocs folder of your XAMPP installaton
   `C:\XAMPP\htdocs\`

### Installing the database

1. Run the MySQL server in XAMPP.
2. In your browse go to address `localhost/phpmyadmin`

Default Method

3. Create a database called `clausia_inventory`.
4. Go to the import tab and import the **clausia_inventory.sql** file.
5. Leave everything to default, scroll down to the bottom and click on the **Go** button.

Custom Method

3. Create a databse and give it your own name.
4. Follow steps **4** and **5** from the Default Method.
5. Go to the file `model/database.php` and replace the databse name in line 3 after the `dbname` parameter

```php
$dsn = "mysql:host=localhost;dbname=clausia_inventory";
```

6. If your MySQL server has a custom username and password, The defaults are `username = root` and no password, set the username in line 5 and the password in line 7.

## Features

This program is built with full CRUD functionality to Insert, Select, Update, and Delete the items as well as the categories. Similarly, the search functionality allows the user to quickly search and operate on the item.

:warning:_Search functionality only works using item name and manufacturer at the moment_

:warning:_Search functionality does not have auto correction ability at the moment._
