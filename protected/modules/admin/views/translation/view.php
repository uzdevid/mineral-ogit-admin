<?php
$this->pageTitle = $model->title;
$this->breadcrumbs = array(
    Yii::t("translation", "translations") => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t("translation", "list"), 'url' => array('index')),
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
    array('label' => Yii::t("translation", "update"), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t("translation", "delete"), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t("translation", "view"); ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'translation_uz',
        'translation_oz',
        'translation_ru',
    ),
));
?>
