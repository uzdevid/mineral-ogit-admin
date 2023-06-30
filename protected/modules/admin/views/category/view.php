<?php
$this->pageTitle = $model->Name;
$this->breadcrumbs = array(
    Yii::t("translation", "categories") => array('index'),
    $model->Name,
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
        array(
            'name' => 'category_id',
            'value' => $model->NameCategory,
        ),
        'title_system',
        'title_ru',
        'title_uz',
        'title_oz',
        'url',
        array(
            'name' => 'status',
            'value' => $model->NameStatus,
        ),
        'product_count',
        'views_count',
        'product_views_count',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => $model->LinkImage,
        ),
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
        array(
            'name' => 'user_id',
            'value' => $model->user->FIO,
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
