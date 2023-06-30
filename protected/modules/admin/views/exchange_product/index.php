<?php
$this->pageTitle = Yii::t("translation", "exchange_products");
$this->breadcrumbs = array(
    Yii::t("translation", "exchange_products"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'exchange-product-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'class' => 'ext.TbButtonColumn',
        ),
    ),
));
?>
