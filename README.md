FacebookApi
=======

Created by Florian Degenhardt

Introduction
------------

FacebookApi is a module for Zend Framework 2.
Example You can easy fill your Website Page content from you Facebook Page.
Feeds, Post, Picture, Album, Events, etc

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