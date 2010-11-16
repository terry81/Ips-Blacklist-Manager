<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title>
            - Bad IPs Manager -
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $html->meta('icon');

            echo $html->css('cake.generic');

            echo $scripts_for_layout;
        ?>
        </head>
        <body>
            <div id="container">
                <div id="header">
                    <h1>
                    <?php

                    if ($session->read('Auth.User.username')) {

                        echo $html->link('All Listed Ips', array('controller' => 'ips', 'action' => 'index')) . ' | ';

                        echo $html->link('Add Ip', array('controller' => 'ips', 'action' => 'add')) . ' | ';

                        echo $html->link('Search Ip', array('controller' => 'ips', 'action' => 'search')) . ' | ';

                        echo $html->link('View requests', array('controller' => 'listings', 'action' => 'index')) . ' | ';

                        echo $html->link('Register New User', array('controller' => 'users', 'action' => 'register')) . ' | ';

                        echo 'You are logged in as ' . $session->read('Auth.User.username') . ' - ';
                        echo $html->link(' Logout', array('controller' => 'users', 'action' => 'logout')) . ' | ';
                    } else {

                        echo $html->link('Request removal', array('controller' => 'listings', 'action' => 'request')) . ' | ';

                        echo $html->link('Login', array('controller' => 'users', 'action' => 'login')) . ' | ';
                    }
                    ?></h1>
            </div>

            <div id="content">



                <?php $session->flash(); ?>

                <?php echo $content_for_layout; ?>

                </div>
                <div id="footer">
                <?php
                    echo $html->link(
                            $html->image('cake.power.gif', array('alt' => __("CakePHP: the rapid development php framework", true), 'border' => "0")),
                            'http://www.cakephp.org/',
                            array('target' => '_blank'), null, false
                    );
                ?>
                </div>
            </div>
        <?php echo $cakeDebug; ?>
    </body>
</html>
