FacebookApi
=======

Created by Florian Degenhardt

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VRMTHV3E4ZD3Y)


Introduction
------------

FacebookApi is a module for Zend Framework 2.
Example You can easy fill your Website Page content from you Facebook Page.
Feeds, Post, Picture, Album, Events, etc


Features / Goals
----------------

* Facebook Graph Api [COMPLETE]
* Page Service Posts (List/Details) [INCOMPLETE]
* Page Service Events (List/Details) [INCOMPLETE]
* Page Service Album (List/Details) [TODO]
* Translate Route [COMPLETE]
* Widgets [TODO]

Installation
------------

### Main Setup

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "flod1/facebook-api": "dev-master"
    }
    ```

2. Now tell composer to download ZfcUser by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'FacebookApi',
        ),
        // ...
    );
    ```



### Post-Install: Config

After installing, copy
`./vendor/flod1/facebook-api/config/facebookapi.global.php.dist` to
`./config/autoload/facebookapi.global.php` and change the values as desired.