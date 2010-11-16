<?php

App::import('Sanitize');

class IpsController extends AppController {

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Ip.id' => 'asc'
        )
    );

    function index() {
        $ips = $this->paginate('Ip');
        $this->set('ips', $ips);
    }

    function view($id) {
        $this->helpers[] = 'Time';
        $this->Ip->id = $id;
        $this->set('ip', $this->Ip->read());
    }

    function add() {

        if (!empty($this->data)) {
            $this->data['Ip']['ip'] = sprintf("%u", ip2long($this->data['Ip']['ipn']));

            $existing_ip = $this->Ip->findByIp($this->data['Ip']['ip']);

            if ($existing_ip != 0) {

                $this->data['Comment']['ip_id'] = $existing_ip['Ip']['id'];
                $this->Session->setFlash('Ip already added. This will be a new comment.');
            } else {
                $ip = $this->Ip->save($this->data);
                $this->data['Comment']['ip_id'] = $this->Ip->id;
            }

            $this->data['Comment']['type'] = $this->data['Ip']['type'];
            $this->data['Comment']['note'] = Sanitize::html($this->data['Ip']['note']);
            $this->data['Comment']['reporterip'] = ip2long(env('REMOTE_ADDR'));
            $this->data['Comment']['user_id'] = $this->Session->read('Auth.User.id');
            $this->Ip->Comment->save($this->data);
            $this->Session->setFlash('Your IP has been saved.');
            $this->redirect(array('action' => 'index'));
        }
    }

    function search($ipn=null) {

        if (!empty($this->data)) {

            $this->Ip->set($this->data);
            if ($this->Ip->validates()) {
                $ip = sprintf("%u", ip2long($this->data['Ip']['ipn']));
                $ips = $this->Ip->findByIp($ip);
                $this->set('ips', $ips);
            } else {
                $this->Session->setFlash('Error! Try again, plase.');
            }
        }
    }

    function change_status($id = null) {
        $this->Ip->id = $id;

        $ip = $this->Ip->read();

        if ($ip['Ip']['active'] == 1) {
            $this->Ip->set('active', 0);
            if ($this->Ip->save($this->data)) {
                $this->Session->setFlash('Ip has been set to inactive.');
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Ip->set('active', 1);
            if ($this->Ip->save($this->data)) {
                $this->Session->setFlash('Ip has been set to active.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

}

?>