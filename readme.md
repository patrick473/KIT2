# KIT 2.0

Project for HU University of Applied Sciences Utrecht

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software


[PHP 7+](http://php.net/downloads.php)

[Composer](https://getcomposer.org/download/)

[MySQL](https://dev.mysql.com/downloads/windows/installer/8.0.html)




### Installing

A step by step series of examples that tell you how to get a development env running

* Create a MySQL database locally named `kit2`

* Pull project

* Rename `.env.example` file to `.env` using `mv .env.example .env`(windows) and fill in the database information

* open console and navigate to the project root directory

* run `composer install`

* run `php artisan key:generate`

* run `php artisan migrate --seed`

* run `php artisan serve` or use the file called `runserver.bat`

You can now acces the project at localhost:8000



## Authors

* **Patrick Kottman** - Team Leader - [github](https://github.com/patrick473)
* **Tim van de Looy** - developer - [github](https://github.com/fir3d3vil)
* **Danny Mostert** - developer - [github](https://github.com/Dannymos)
* **Thomas Mocellin** - developer - [github](https://github.com/thomasboy020)

