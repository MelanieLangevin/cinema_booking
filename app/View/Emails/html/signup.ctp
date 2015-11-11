<?php

echo __('<p><strong>Hi ' . $username . '</strong></p>'
        . '<p>This is your password : ' . $password .
        '</p><p>Click here to activate your  account : ');
echo __($this->Html->link('Here', $active));
echo __('Have a good day');
echo __('Cinemamenic');
