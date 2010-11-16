<h1>Add Ip</h1>

<?php
echo $form->create('Ip');
echo $form->input('ipn');
echo $form->input('type', array('options' => array(
            '' =>    'Please select',
            'hack' =>    'Hack',
            'spam' =>    'Spam',
            'other' =>    'Other'
 )));
echo $form->input('note');
echo $form->end('Add IP');
?>