<?php

require __DIR__."/../bootstrap/autoload.php";

header("Content-Type: application/json");

$captcha = new TeaCaptcha;
$captcha->run();
