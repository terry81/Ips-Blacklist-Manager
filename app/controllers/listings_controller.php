<?php

App::import('Sanitize');

class ListingsController extends AppController {

    public $components = array('Recaptcha');

    function index() {
        $listings = $this->paginate('Listing', array('Listing.checked =' => 0));
        $this->set('listings', $listings);
    }

    function recaptcha() {
        $this->Recaptcha->render();
    }

    function attend($id=null, $ip_id=null) {
        $this->Listing->id = $id;
        $this->Listing->saveField('checked', 1);
        $this->Session->setFlash('Request is yours. Check the info for the ip.');
        $this->redirect(array('controller' => 'ips', 'action' => 'view', 'id' => $this->params['named']['ip_id']));
    }

    function request() {

        $this->Listing->set($this->data);

        if (!empty($this->data) && $this->Listing->validates()) {
            if ($this->Recaptcha->verify()) {
                $ip = sprintf("%u", ip2long($this->data['Listing']['ipn']));

                $this->loadModel('Ip');

                $ip_id = $this->Ip->findByIp($ip);

                if ($ip_id['Ip']['id'] > 0) {

                    $this->data['Listing']['ip_id'] = $ip_id['Ip']['id'];
                    $this->Session->setFlash('Ip found.');
                    $this->data['Listing']['note'] = Sanitize::html($this->data['Listing']['note']);
                    $this->data['Listing']['reporterip'] = ip2long(env('REMOTE_ADDR'));
                    $this->Listing->save($this->data);
                    $this->Session->setFlash('Your request has been received.');
                } else {
                    $this->Session->setFlash('This IP is not listed with us.');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash('Please enter the correct captcha code.');
            }
        }
    }

}

?>
