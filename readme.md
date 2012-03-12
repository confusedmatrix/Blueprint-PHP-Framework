#Blueprint PHP Framework
A lightweight MVC framework written in PHP

_Requires PHP 5.3 or above as it is fully namespaced_

To get started:

* Rename .htaccess.default to .htaccess (and set RewriteBase if necessary)
* Adjust paths in /etc/constants.php (if necessary)
* Rename /etc/config.default.php to /etc/config.php
* Set settings in /etc/config.php
* You must load the /etc/tables.sql into the database
* Register any namespaces in /app/ that you want to use in your application
    $router->registerRouteMap('{namespace}');
* Start building

