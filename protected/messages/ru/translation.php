<?php

$models = Translation::model()->findAll();
$list = CHtml::listData($models, 'title', 'translation_ru');
return $list;
