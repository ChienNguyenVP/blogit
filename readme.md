Admin template

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]



## Install

Via Composer

``` bash
$ git clone https://github.com/ChienNguyenVP/blogit.git
```

## Usage
1. run commands install package’s
``` bash
$ composer install
```

coppy .env.example to .env 

Method 1: Run

``` bash
$ php artisan blog:install
```

Method 2:

1. Run commands
``` bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```
2. Run commands to publish the package’s config and assets and database
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```

3. Go to  domain/ and check it. 
4. Go to  domain/admin and check it. 
``` bash
gmail: chiennguyen@gmail.com
password: 123456
```



