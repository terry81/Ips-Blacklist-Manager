<?php

class Ip extends AppModel {

    public $validate = array(
        'ip' => array(
            'rule' => 'numeric',
            'message' => 'Ip should turn into a number'
        ),
        'ipn' => array(
            'rule' => 'ip',
            'message' => 'Ips Only'
        ),
        'note' => array(
            'rule' => 'notEmpty'
        )
    );

    public $hasMany = array(
        'Comment' => array(
            'className'  => 'Comment',
            'order'      => 'Comment.created DESC'
        )
    );

}

?>