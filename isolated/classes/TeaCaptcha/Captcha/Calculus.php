<?php

namespace TeaCaptcha\Captcha;

use TeaCaptcha\CaptchaFoundation;

/**
 * @package \TeaCaptcha\Captcha
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license GNU
 * @version 0.0.1
 */
class Calculus extends CaptchaFoundation
{
    /**
     * @return void
     */
    public function run(): void
    {
        $list = explode("\n", trim(file_get_contents(CAPTCHA_DIR."/calculus/001_list.txt")));
        $n = array_rand($list);
        $this->response = self::reqIsolate(CAPTCHA_DIR."/calculus/calculus_".$list[$n].".php");
    }

    /**
     * @return mixed
     */
    public static function reqIsolate(string $file)
    {
    	return require $file;
    }
}
