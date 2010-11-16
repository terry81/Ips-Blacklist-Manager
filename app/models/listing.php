<?php

class Listing extends AppModel {

    public $validate = array(
        'ipn' => array(
            'ip' => array(
                'rule' => 'ip',
                'required' => true,
                'message' => 'Ips Only'
            )
        ),
        'note' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'between' => array(
                'rule' => array('between', 5, 55),
                'message' => 'Please enter a longer description'
            )
        )
    );

}

?>