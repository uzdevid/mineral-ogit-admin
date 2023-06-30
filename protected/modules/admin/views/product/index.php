<?php
$this->pageTitle = Yii::t("translation", "products");
$this->breadcrumbs = array(
    Yii::t("translation", "products"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'category_id',
            'value' => '$data->NameCategory',
        ),
        'title',
        array(
            'name' => 'status',
            'value' => '$data->NameStatus',
        ),
        array(
            'class' => 'ext.TbButtonColumn',
        ),
    ),
));
?>
