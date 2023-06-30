<?php
$this->pageTitle = $model->title_ru;
$this->breadcrumbs = array(
    Yii::t("translation", "regions") => array('index'),
    $model->title_ru => array('view', 'id' => $model->id),
    Yii::t('translation', 'update'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "list"), 'url' => array('index')),
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
    array('label' => Yii::t("translation", "view"), 'url' => array('view', 'id' => $model->id)),
);
?>

<h1><?php echo Yii::t("translation", "update"); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>