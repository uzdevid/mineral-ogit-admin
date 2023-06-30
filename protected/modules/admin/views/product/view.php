<?php
$this->pageTitle = $model->title;
$this->breadcrumbs = array(
    Yii::t("translation", "products") => array('index'),
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
        array(
            'name' => 'category_id',
            'value' => $model->NameCategory,
        ),
        'id',
        'title',
        array(
            'name' => 'status',
            'value' => $model->NameStatus,
        ),
        'image1',
        'image2',
        'image3',
        'image4',
        'price_1',
        'price_2',
        'price_3',
        'description',
        'available_1',
        'available_2',
        'available_3',
        array(
            'name' => 'delivery_type',
            'value' => $model->NameDeliveryType,
        ),
        array(
            'name' => 'location_type_1',
            'value' => $model->getNameLocationType($model->location_type_1),
        ),
        array(
            'name' => 'location_type_2',
            'value' => $model->getNameLocationType($model->location_type_2),
        ),
        array(
            'name' => 'location_type_3',
            'value' => $model->getNameLocationType($model->location_type_3),
        ),
        'production_date_month',
        'production_date_year',
        array(
            'name' => 'payment_type_1',
            'value' => $model->getNamePaymentType($model->payment_type_1),
        ),
        array(
            'name' => 'payment_type_2',
            'value' => $model->getNamePaymentType($model->payment_type_2),
        ),
        array(
            'name' => 'payment_type_3',
            'value' => $model->getNamePaymentType($model->payment_type_3),
        ),
        array(
            'name' => 'vat',
            'value' => $model->NameVat,
        ),
        'latitude',
        'longitude',
        'views_count',
        'user_id',
        array(
            'name' => 'contact_type',
            'value' => $model->NameContactType,
        ),
        array(
            'name' => 'region_id',
            'value' => $model->NameRegion,
        ),
        array(
            'name' => 'type',
            'value' => $model->NameType,
        ),
        'create_time',
        'update_time',
    ),
));
?>
