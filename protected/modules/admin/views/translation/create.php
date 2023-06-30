<?php
$this->pageTitle = Yii::t("translation", "create");
$this->breadcrumbs = array(
    Yii::t("translation", "translations") => array('index'),
    Yii::t('translation', 'create'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "list"), 'url' => array('index')),
);
?>

<h1><?php echo Yii::t("translation", "create"); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>