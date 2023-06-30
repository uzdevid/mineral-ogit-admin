<?php

$models = Translation::model()->findAll();
$list = CHtml::listData($models, 'title', 'translation_uz');
return $list;
