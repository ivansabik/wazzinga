<?php
require './vendor/autoload.php';
require_once './vendor/whatsapp/chat-api/src/Registration.php';
require_once './vendor/whatsapp/chat-api/src/whatsprot.class.php';

$app = new \Slim\Slim();

// Get code by SMS
$app->get('/v1/code', function () use ($app) {
    $app->response->headers->set('Content-Type', 'application/json');
    $username = $app->request()->get('number');
    $w = new Registration($username);
    echo json_encode($w->codeRequest('sms'));
});

// Register code 
$app->get('/v1/register', function () use ($app) {
    $app->response->headers->set('Content-Type', 'application/json');
    $username = $app->request()->get('number');
    $code = $app->request()->get('code');
    $w = new Registration($username);
    echo json_encode($w->codeRegister($code));
});
// Send message
$app->post('/v1/send', function () use ($app) {
    $app->response->headers->set('Content-Type', 'application/xml');
    $node = _assignNode();
    $sender = $node['number'];
    $password = $node['pass'];
    $destination = $app->request()->post('destination');
    $message = $app->request()->post('message');
    $w = new WhatsProt($sender, 'wazzinga', true);
    $w->connect();
    $w->loginWithPassword($password);
    $w->sendMessage($destination, $message);
});
// List client nodes
$app->get('/v1/nodes', function () use ($app) {
    $app->response->headers->set('Content-Type', 'application/json');
    $nodes = _readClientNodes();
    echo json_encode($nodes);
});

$app->run();

function _readClientNodes() {
  $nodes = include('./nodes.php');
  return $nodes;
}

function _assignNode() {
  $nodes = include('./nodes.php');
  $node = $nodes[array_rand($nodes)];
  return $node;
}
