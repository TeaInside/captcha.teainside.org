<?php

require __DIR__."/../third_party/php-preprocessor/src/autoload.php";

use PhpPreprocessor\PhpPreprocessor;
use PhpPreprocessor\Components\DefConst;

$st = new PhpPreprocessor;
$st->minify = false;
$st->setFile(__DIR__."/database.php");
$st->addNode(new DefConst("API_TOKEN", "this is an API TOKEN"));
$st->addNode(new DefConst("ADMINS", [1,2,3,4,5]));
$st->addNode(new DefConst("SOMETHING", null));
$st->build();
