<?php
require_once('./vendor/whatsapp/chat-api/src/Registration.php');

$debug = true;
$username = '525536744626';  
$w = new Registration($username, $debug);
$w->codeRequest('sms');
