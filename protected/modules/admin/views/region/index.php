<?php
$this->pageTitle = Yii::t("translation", "regions");
$this->breadcrumbs = array(
    Yii::t("translation", "regions"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'region-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title_ru',
        'title_uz',
        'title_oz',
        array(
            'class' => 'ext.TbButtonColumn',
        ),
    ),
));
?>
