<?php

class UsersController extends AppController {

    function login() {
        $this->Auth->loginRedirect = array('controller' => 'pages', 'display' => 'home');
    }

    function logout() {
        $this->Session->setFlash('You have successfully logged out.');
        $this->redirect($this->Auth->logout());
    }

    function register() {
        if (!empty($this->data)) {
            if ($this->data['User']['password']
                    == $this->Auth->password($this->data['User']['password_confirm'])) {

                $this->User->create();
                if ($this->User->save($this->data)) {
                    $this->Session->setFlash('The new user has been registered and can log in now.');
                    $this->redirect(array('controller' => 'ips', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash('password mismatch');
            }
        }
    }

}

?>