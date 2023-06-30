<?php
$this->pageTitle = Yii::t("translation", "categories");
$this->breadcrumbs = array(
    Yii::t("translation", "categories"),
    Yii::t('translation', 'list'),
);

$this->menu = array(
    array('label' => Yii::t("translation", "create"), 'url' => array('create')),
);
?>

<h1><?php echo Yii::t("translation", "list"); ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'pager' => 'ext.TbLinkPager',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'category_id',
            'value' => '$data->NameCategory',
        ),
        'title_system',
        'title_ru',
        'title_uz',
        'title_oz',
        'url',
        /*
          'create_time',
          'update_time',
          'status',
          'product_count',
          'views_count',
          'product_views_count',
          'image',
          'sort',
          'seo_title_ru',
          'seo_title_uz',
          'seo_title_oz',
          'seo_description_ru',
          'seo_description_uz',
          'seo_description_oz',
          'seo_keywords_ru',
          'seo_keywords_uz',
          'seo_keywords_oz',
          'category_id',
          'user_id',
          'type',
         */
        array(
            'class' => 'ext.TbButtonColumn',
        ),
    ),
));
?>
