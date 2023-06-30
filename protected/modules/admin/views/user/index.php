<?php
$this->pageTitle = Yii::t("translation", "users");
$this->breadcrumbs = array(
    Yii::t("translation", "users"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'phone',
        'name',
        'surname',
        'lang',
        array(
            'name' => 'role',
            'value' => '$data->NameRole',
        ),
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
