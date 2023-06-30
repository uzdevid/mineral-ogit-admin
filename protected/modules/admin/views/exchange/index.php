<?php
$this->pageTitle = Yii::t("translation", "exchanges");
$this->breadcrumbs = array(
    Yii::t("translation", "exchanges"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'exchange-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'exchange_product_id',
            'value' => '$data->exchangeProduct->title',
        ),
        array(
            'name' => 'region_id',
            'value' => '$data->NameRegion',
        ),
        'unit_value',
        'unit',
        'price_min',
        'price_max',
        array(
            'name' => 'status',
            'value' => '$data->NameStatus',
        ),
        'currency',
        'publish_time',
        array(
            'class' => 'ext.TbButtonColumn',
        ),
    ),
));
?>
