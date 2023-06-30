<?php

$array = array(
    'widgetFactory' => array(
        'widgets' => array(
            'CGridView' => array(
                'htmlOptions' => array(
                    'class' => 'table-responsive',
                ),
                'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable no-footer',
                'cssFile' => false,
                'summaryCssClass' => 'summary_table',
            ),
            'CDetailView' => array(
                'htmlOptions' => array(
                    'class' => 'table table-striped',
                ),
                'cssFile' => false,
            ),
            'CMenu' => array(
                'encodeLabel' => false,
                'htmlOptions' => array(
                    'class' => 'navbar-nav mr-auto',
                ),
                'itemCssClass' => 'nav-item',
                'submenuHtmlOptions' => array(
                    'class' => 'dropdown-menu',
                ),
            ),
            'CBreadcrumbs' => array(
                'tagName' => 'ol',
                'htmlOptions' => array('class' => 'breadcrumb'),
                'separator' => '',
                'activeLinkTemplate' => '<li class="breadcrumb-item"><a href="{url}">{label}</a></li>',
                'inactiveLinkTemplate' => '<li class="breadcrumb-item active" aria-current="page">{label}</li>'
            ),
            'CLinkPager' => array(
                'header' => '',
                'htmlOptions' => array(
                    'class' => 'pagination',
                    'ajaxUpdate' => false,
                ),
                'cssFile' => false,
                'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
                'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
                'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                'selectedPageCssClass' => 'active',
            ),
        ),
    ),
    'clientScript' => array(
        'packages' => array(
            'jquery' => array(
                'baseUrl' => '/js/',
                'js' => array('jquery-3.3.1.min.js'),
            )
        ),
    ),
    'authManager' => array(
        'class' => 'PhpAuthManager',
        'defaultRoles' => array('guest'),
    ),
    'user' => array(
        'loginUrl' => array('login/index'),
        'allowAutoLogin' => true,
        'class' => 'WebUser',
    ),
    'urlManager' => array(
        'class' => 'ext.yii-multilanguage.MLUrlManager',
        'urlFormat' => 'path',
        'showScriptName' => false,
        'languages' => array(
            'ru',
            'uz',
            'oz',
        ),
        'rules' => array(
            '/' => 'site/index',
            'error' => 'error/index',
            'profile' => 'profile/index',
            'logout' => 'logout/index',
            //
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            //   
            '<module:\w+>/<controller:\w+>/<id:\d+>/<action:\w+>' => '<module>/<controller>/<action>',
            '<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
            '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            '<module:\w+>/<controller:\w+>' => '<module>/<controller>',
            '<module:\w+>' => '<module>',
        ),
    ),
    'db' => require(dirname(__FILE__) . '/database.php'),
    'errorHandler' => array(
        'errorAction' => YII_DEBUG ? null : 'error/index',
    ),
    'log' => array(
        'class' => 'CLogRouter',
        'routes' => array(
            array(
                'class' => 'CFileLogRoute',
                'levels' => 'error, warning',
            ),
        ),
    ),
    'SystemClass' => array(
        'class' => 'ext.SystemClass',
    ),
    'TranslitClass' => array(
        'class' => 'ext.TranslitClass',
    ),
);

return $array;
