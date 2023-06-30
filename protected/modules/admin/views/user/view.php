<?php
$this->pageTitle = $model->name;
$this->breadcrumbs = array(
    Yii::t("translation", "users") => array('index'),
    $model->name,
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
        'phone',
        'name',
        'surname',
        array(
            'name' => 'role',
            'value' => $model->NameRole,
        ),
        array(
            'name' => 'status',
            'value' => $model->NameStatus,
        ),
        'create_time',
        'update_time',
        'authorization_time',
        'recover_password',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => $model->LinkImage,
        ),
        'organization_image',
        'organization_name',
        'organization_phone_number',
        'inn',
        'mfo',
        'bank_info',
        'organization_about',
        'lang',
    ),
));
?>
