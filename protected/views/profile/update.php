<?php
$this->pageTitle = $model->FIO;
$this->breadcrumbs = array(
    $model->FIO => array('index'),
    Yii::t('translation', 'settings'),
);
?>

<h1><?php echo Yii::t("translation", "settings"); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>