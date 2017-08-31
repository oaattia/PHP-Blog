<?php

use Oaattia\App;


require "../constants.php";
require "../database.php";     // rename the database.php.example to database.php and fill in the values
require "../autoload.php";


// start the app here
$app = new App();
list($controller, $method) = $app->handleUrl($_SERVER['REQUEST_URI']);
$app->run($controller, $method);