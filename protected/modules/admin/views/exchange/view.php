<?php
$this->pageTitle = $model->exchangeProduct->title;
$this->breadcrumbs = array(
    Yii::t("translation", "exchanges") => array('index'),
    $model->exchangeProduct->title,
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
        array(
            'name' => 'exchange_product_id',
            'value' => $model->exchangeProduct->title,
        ),
        array(
            'name' => 'region_id',
            'value' => $model->NameRegion,
        ),
        'unit_value',
        'unit',
        'price_min',
        'price_max',
        'currency',
        array(
            'name' => 'status',
            'value' => $model->NameStatus,
        ),
        'publish_time',
        'create_time',
        'update_time',
    ),
));
?>
