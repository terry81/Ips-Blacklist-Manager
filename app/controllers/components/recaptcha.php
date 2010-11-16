<?php
class RecaptchaComponent extends Object
{
    public $publickey = "YOUR_PUB_KEY"; // use your public key here
    public $privatekey = "YOUR_PRIVATE_KEY"; // user your private key here

    function startup(&$controller)
    {
        $this->controller = $controller;
    }

    function render()
    {
        App::import('vendor', 'Recaptcha', array('file'=>'recaptcha/recaptchalib.php'));


        $error = null;

        echo recaptcha_get_html($this->publickey, $error);
    }

    function verify()
    {
        App::import('vendor', 'Recaptcha', array('file'=>'recaptcha/recaptchalib.php'));

        $resp = recaptcha_check_answer ($this->privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
            return true;
        } else {
            return false;
        }
    }
}
?>
