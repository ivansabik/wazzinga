<?php
require './vendor/autoload.php';
require_once './vendor/whatsapp/chat-api/src/Registration.php';
require_once './vendor/whatsapp/chat-api/src/whatsprot.class.php';

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// Get code by SMS
$app->get('/v1/code', function () use ($app) {
    $username = $app->request()->get('number');
    $debug = false;
    $w = new Registration($username, $debug);
    echo json_encode($w->codeRequest('sms'));
});

// Register code 
$app->get('/v1/register', function () use ($app) {
    $username = $app->request()->get('number');
    $debug = false;
    $w = new Registration($username, $debug);
    echo json_encode($w->codeRegister('sms'));
});
// Send message
$app->get('/v1/send', function () use ($app) {
    $nodes = _readClientNodes();
    $node = $nodes[array_rand($nodes)];
    $sender = $node['number'];
    $password = $node['pass'];
    $destination = $app->request()->get('destination');
    $message = $app->request()->get('message');
    $debug = true;
    $w = new WhatsProt($sender, 'wazzinga', $debug);
    $w->connect();
    $w->loginWithPassword($password);
    $w->sendMessage($destination, $message);
});
// List client nodes
$app->get('/v1/nodes', function () use ($app) {
    $nodes = _readClientNodes();
    echo json_encode($nodes);
});

$app->run();

function _readClientNodes() {
  $nodes = include('./nodes.php');
  return $nodes;
}
