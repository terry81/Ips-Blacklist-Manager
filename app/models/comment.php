<?php

class Comment extends AppModel {

    public $validate = array(
        'type' => array(
            'rule' => array('inList', array('hack', 'spam', 'other')),
            'message' => 'Validation not passed for type'
        )
    );
    public $belongsTo = array(
        'Ip' => array(
            'className' => 'Ip',
            'foreignKey' => 'ip_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

}

?>