<?php

$http = 'http';
$host = $_SERVER['HTTP_HOST'];
$main_url = $http . '://' . $host;

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Adminka Mineralogit',
    'sourceLanguage' => 'en_US',
    'language' => 'uz',
    'defaultController' => 'site',
    'charset' => 'UTF-8',
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.YiiMailer.YiiMailer',
        'ext.easyimage.EasyImage'
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'm500',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin',
    ),
    'components' => require(dirname(__FILE__) . '/components.php'),
    'params' => array(
        'adminEmail' => 'info@mineralogit.uz',
        'sms' => [
            'login' => '',
            'pass' => '',
            'id' => '',
        ],
        'url' => $main_url, // 'https://admin.mineralogit.uz' 
        'web_url' => $host == 'mineralogit.admin' ? 'http://mineralogit.admin' : 'https://admin.mineralogit.uz',
        'bot_token' => '',
        'chat_id' => '',
        'admin_key' => 'UD9DasN8',
        'recaptcha_v3' => array(
            'secret_key' => 'secret_key',
            'public_key' => 'public_key',
            'score' => 0.5,
        ),
        'notification_auth_key' => '',
    ),
);
