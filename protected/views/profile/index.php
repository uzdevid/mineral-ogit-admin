<?php
$this->pageTitle = $model->FIO;
$this->breadcrumbs = array(
    $model->FIO,
);

$this->menu = array(
    array('label' => Yii::t("translation", "settings"), 'url' => array('update')),
);
?>

<h1><?php echo Yii::t("translation", "profile"); ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'name',
        'surname',
        'phone',
        array(
            'name' => 'role',
            'value' => $model->NameRole,
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => $model->LinkImage,
        ),
        'lang',
        array(
            'name' => 'status',
            'value' => $model->NameStatus,
        ),
        'create_time',
        'update_time',
        'authorization_time',
    ),
));
?>
