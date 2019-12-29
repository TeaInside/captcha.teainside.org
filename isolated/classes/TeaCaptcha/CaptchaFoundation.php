<?php

namespace TeaCaptcha;

/**
 * @package \TeaCaptcha
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license GNU
 * @version 0.0.1
 */
abstract class CaptchaFoundation
{
	/**
	 * @var \TeaCaptcha\TeaCaptcha
	 */
	protected $teaCaptcha;

	/**
	 * @param \TeaCaptcha\TeaCaptcha $teaCaptcha
	 *
	 * Constructor.
	 */
	public function __construct(TeaCaptcha $teaCaptcha)
	{
		$this->teaCaptcha = $teaCaptcha;
	}
}
