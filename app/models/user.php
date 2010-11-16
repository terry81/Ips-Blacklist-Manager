<?php

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'exists' => array(
                'rule' => array('checkUnique', 'username'),
                'message' => 'The Username you entered has been taken.'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3),
                'message' => 'Username must at least be 3 character long.'
            )
        ),
        'password' => array(
            'mingLength' => array(
                'rule' => array('minLength', '6'),
                'message' => 'Mimimum 6 characters long'
            )
        )
    );

    function checkUnique($data, $fieldName) {
        $valid = false;
        if (isset($fieldName) && $this->hasField($fieldName)) {
            $valid = $this->isUnique(array($fieldName => $data));
        }
        return $valid;
    }

}

?>