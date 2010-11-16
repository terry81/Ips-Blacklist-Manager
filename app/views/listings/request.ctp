<h1>Request IP Whitelisting</h1>

<p>Please enter below the IP which you'd like to whitelist.
Don't forget to add an explanation.</p>

<?php
echo $form->create('Listing', array('action' => 'request'));
echo $form->input('ipn');
echo $form->input('note');
echo $form->submit();
$this->requestAction('listings/recaptcha');
echo $form->end();
?>
