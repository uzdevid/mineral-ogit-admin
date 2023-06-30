<!doctype html>
<html lang="<?php echo Yii::app()->language; ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css">       
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">   
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/error.css">
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>   
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>  
        <div class="container error">
            <h2>Error <?php echo $code; ?></h2>
            <div class="text-danger my-2">
                <?php echo CHtml::encode($message); ?>
            </div>
            <div class="text-center">
                <a href="/" class="btn btn-outline-primary"><?php echo Yii::t("translation", "go_to_main_page"); ?></a>
            </div>         
        </div>    
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>       
    </body>
</html>