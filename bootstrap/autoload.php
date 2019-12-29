<?php

require __DIR__."/../isolated/helpers.php";

/**
 * @param string $class
 */
function internalTeaCaptchaAutoloader(string $class)
{
	if (file_exists($f = __DIR__."/../isolated/classes/".str_replace("\\", "/", $class).".php")) {
		require $f;
	}
}

spl_autoload_register("internalTeaCaptchaAutoloader");
