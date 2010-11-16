<?php

class AppController extends Controller {

    public $components = array('Auth');

    function beforeFilter() {
        $this->Auth->allow('request', 'recaptcha');
        $this->Auth->authorize = 'controller';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'ips', 'action' => 'index');
        $this->Auth->logoutRedirect = '/';
    }

    function isAuthorized() {
        return true;
    }

}

?>