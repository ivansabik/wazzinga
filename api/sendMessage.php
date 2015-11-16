<?php
set_time_limit(10);
require_once './vendor/whatsapp/chat-api/src/whatsprot.class.php';

date_default_timezone_set('Europe/Madrid');

$username = "5215536744626";
$password = "aHAO9RdIQphi8EfbCQLZ63uX5Ag=";
$nickname = "wazzinga";
$target = "5215571216245";
$debug = true;

echo "[] Logging in as '$nickname' ($username)\n";
$w = new WhatsProt($username, $nickname, $debug);
$w->connect();
$w->loginWithPassword($password);
echo "[*] Connected to WhatsApp\n\n";
$w->sendMessage($target, "wazzinga");
