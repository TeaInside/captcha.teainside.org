<?php

namespace TeaCaptcha;

use TeaCaptcha\Captcha\Cpp;
use TeaCaptcha\Captcha\Assembly;
use TeaCaptcha\Captcha\Calculus;

/**
 * @package \TeaCaptcha
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license GNU
 * @version 0.0.1
 */
class TeaCaptcha
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $userKey;

    /**
     * @var int
     */
    private $level = 1;

    /**
     * @var string
     */
    private $type = null;

    /**
     * @var string
     */
    private $error = null;

    /**
     * @var int
     */
    private $httpCode = 200;

    /**
     * @var int
     */
    public $jsonFlags = JSON_UNESCAPED_SLASHES;

    /**
     * Constructor.
     */
    public function __construct()
    {
        define("CAPTCHA_DIR", realpath(__DIR__."/../../captcha"));

        if (isset($_GET["key"]) && is_string($_GET["key"])) {
            $this->userKey = $_GET["key"];
        } else if (isset($_SERVER["HTTP_API_KEY"])) {
            $this->userKey = $_SERVER["HTTP_API_KEY"];
        } else {
            $this->setError("Unauthorized", 401);
            return;
        }

        if (isset($_GET["action"]) && is_string($_GET["action"])) {
            $this->action = $_GET["action"];
        } else {
            $this->setError(
                "\"action\" parameter is required.",
                400
            );
            return;
        }
    }

    /**
     * @param string $msg
     * @param ?int   $httpCode
     * @return void
     */
    private function setError(string $msg, ?int $httpCode = null): void
    {
        $this->error = $msg;
        if (is_int($httpCode)) {
            $this->httpCode = $httpCode;
        }
    }

    /**
     * @return bool
     */
    private function errorCheck(): bool
    {
        if (isset($this->error)) {
            http_response_code($this->httpCode);
            echo json_encode(
                [
                    "status" => "error",
                    "message" => $this->error
                ],
                $this->jsonFlags
            );
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    private function checkCredential(): void
    {
        if (!isset($this->error)) return;

        if ($this->userKey !== "abc123") {
            $this->setError("Unauthorized", 401);
        }
    }

    /**
     * @return void
     */
    private function getCaptcha()
    {
        if (isset($_GET["level"]) && is_string($_GET["level"])) {
            if (!is_numeric($_GET["level"])) {
                $this->setError(
                    "\"level\" parameter must be numeric. Given value: \"{$_GET["level"]}\"",
                    400
                );
                return;
            }
            $this->level = (int)$_GET["level"];
        }

        if (isset($_GET["type"]) && is_string($_GET["type"])) {
            $this->type = $_GET["type"];
        } else {
            $this->setError(
                "\"type\" parameter is required and must be a string.",
                400
            );
            return;
        }

        switch ($this->type) {
            case "calculus":
                $captcha = new Calculus($this);
                break;
            case "assembly":
                $captcha = new Assembly($this);
                break;
            case "cpp":
                $captcha = new Cpp($this);
                break;
            default:
                $this->setError("Invalid captcha type. Given type: \"{$this->type}\"", 400);
                return;
                break;
        }

        $captcha->run();
        http_response_code($this->httpCode);
        echo json_encode($captcha->getResponse(), $this->jsonFlags);
        exit;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->checkCredential();

        if ($this->errorCheck()) return;

        switch ($this->action) {
            case "get_captcha":
                $this->getCaptcha();
                break;
            
            default:
                $this->setError("Invalid action \"{$this->action}\"", 400);
                break;
        }

        $this->errorCheck();
    }
}
