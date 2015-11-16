<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

// Get code by SMS
$app->get('/code', function () use ($app) {
    $username = $app->request()->get('number');
    echo $username;
});

// Register code 
$app->get('/register', function () use ($app) {
    $username = $app->request()->get('number');
    $code = $app->request()->get('code');
    echo $code;
    echo $username;
});
// Send message
$app->get('/send', function () use ($app) {
    $number = $app->request()->get('number');
    $password = $app->request()->get('pass');
    $destination = $app->request()->get('destination');
    echo $number;
    echo $password;
    echo $destination;
});

$app->run();
