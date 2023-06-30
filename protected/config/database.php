<?php

if ($_SERVER['SERVER_NAME'] == 'mineralogit.admin') {
    return array(
        'connectionString' => 'mysql:host=localhost;dbname=mineralogit_base',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    );
} else {
    return array(
        'connectionString' => 'mysql:host=localhost;dbname=mineralogit_base',
        'emulatePrepare' => true,
        'username' => 'mineralogit_user',
        'password' => 'jUHcM2AsFwv3LUEh',
        'charset' => 'utf8mb4',
    );
}


