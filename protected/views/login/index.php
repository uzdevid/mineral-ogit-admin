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
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-3.3.1.min.js"></script>    
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body class="text-center">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'form-signin',
            ),
        ));
        ?>

        <img style="width: 300px;" class="mb-4 img-fluid" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="Mineralogit">
        <h1 class="h3 mb-3 font-weight-normal"><?php echo Yii::t("translation", "please_sign_in"); ?></h1>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'username', array('class' => 'sr-only')); ?>
            <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'password', array('class' => 'sr-only')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'password'); ?>                       
        </div>

        <div class="custom-control custom-checkbox mb-3">           
            <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'custom-control-input')); ?>  
            <label class="custom-control-label" for="LoginForm_rememberMe"><?php echo Yii::t("translation", "remember_me_next_time"); ?></label>
        </div>

        <?php echo CHtml::submitButton(Yii::t("translation", "login"), array('class' => 'btn btn-lg btn-primary btn-block')); ?>                

        <?php $this->endWidget(); ?>
    </body>
</html>