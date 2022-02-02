<?php

define('INCLUDE_DIR', dirname(__FILE__) . '/Code/php/inc/');

$rules = array(
    //
    //API Routes
    'apiShowEvents' => "/api/allEvents",
    'apiShowSingleDogs' => "/api/singleDog/(?'dogID'[\w\-]+)",
    
    //Goal Pages
    'Goals/Goal1' => "/Goals/Goal1.php",
    'Goals/Goal2' => "/Goals/Goal2.php",
    'Goals/Goal3' => "/Goals/Goal3.php",
    'Goals/Goal4' => "/Goals/Goal4.php",
    'Goals/Goal5' => "/Goals/Goal5.php",
    'Goals/Goal6' => "/Goals/Goal6.php",
    'Goals/Goal7' => "/Goals/Goal7.php",
    'Goals/Goal8' => "/Goals/Goal8.php",
    'Goals/Goal9' => "/Goals/Goal9.php",
    'Goals/Goal10' => "/Goals/Goal10.php",
    'Goals/Goal11' => "/Goals/Goal11.php",
    'Goals/Goal12' => "/Goals/Goal12.php",
    'Goals/Goal13' => "/Goals/Goal13.php",
    'Goals/Goal14' => "/Goals/Goal14.php",
    'Goals/Goal15' => "/Goals/Goal15.php",
    'Goals/Goal16' => "/Goals/Goal16.php",
    'Goals/Goal17' => "/Goals/Goal17.php",
    
    


    //Admin Pages
    //
    'login' => "/login",
    'createAdmin' => "/createAdmin",
    'eventPage' => "/api/createEvent",
    'logout' => "/logout",
    'editEvent'=> "/api/editEvent",
    //
    // Home Page
    //
    'home' => "/"
    //
    // Style
    //
);

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach ($rules as $action => $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR . $action . '.php');
        exit();
    }
}

// nothing is found so handle the 404 error
include(INCLUDE_DIR . '404.php');

?>


