<?php
$this->pageTitle = Yii::t("translation", "translations");
$this->breadcrumbs = array(
    Yii::t("translation", "translations"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'pager' => 'ext.TbLinkPager',
    'id' => 'translation-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        'translation_uz',
        'translation_oz',
        'translation_ru',
        array(
            'class' => 'ext.TbButtonColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    'options' => ['class' => 'btn btn-outline-primary btn-sm', 'title' => Yii::t("translation", "view")]
                ),
                'update' => array(
                    'options' => ['class' => 'btn btn-outline-info btn-sm', 'title' => Yii::t("translation", "update")]
                ),
                'delete' => array(
                    'options' => ['class' => 'btn btn-outline-dark btn-sm', 'title' => Yii::t("translation", "delete")]
                ),
            ),
        ),
    ),
));
?>
