<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'category-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'category_id'); ?>
    <?php echo $form->dropDownList($model, 'category_id', $model->Tree, array('empty' => '----', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'category_id'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'title_system'); ?>
    <?php echo $form->textField($model, 'title_system', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_system'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'title_ru'); ?>
    <?php echo $form->textField($model, 'title_ru', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_ru'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'title_uz'); ?>
    <?php echo $form->textField($model, 'title_uz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_uz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'title_oz'); ?>
    <?php echo $form->textField($model, 'title_oz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title_oz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'url'); ?>
    <?php echo $form->textField($model, 'url', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'url'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->dropDownList($model, 'status', $model->listStatus(), array('empty' => '----', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'status'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'image'); ?>
    <?php echo $form->textField($model, 'image', array('class' => 'form-control', 'size' => 18, 'maxlength' => 18)); ?>
    <?php echo $form->error($model, 'image'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'sort'); ?>
    <?php echo $form->textField($model, 'sort', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'sort'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_title_ru'); ?>
    <?php echo $form->textField($model, 'seo_title_ru', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_title_ru'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_title_uz'); ?>
    <?php echo $form->textField($model, 'seo_title_uz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_title_uz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_title_oz'); ?>
    <?php echo $form->textField($model, 'seo_title_oz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_title_oz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_description_ru'); ?>
    <?php echo $form->textField($model, 'seo_description_ru', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_description_ru'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_description_uz'); ?>
    <?php echo $form->textField($model, 'seo_description_uz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_description_uz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_description_oz'); ?>
    <?php echo $form->textField($model, 'seo_description_oz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_description_oz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_keywords_ru'); ?>
    <?php echo $form->textField($model, 'seo_keywords_ru', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_keywords_ru'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_keywords_uz'); ?>
    <?php echo $form->textField($model, 'seo_keywords_uz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_keywords_uz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'seo_keywords_oz'); ?>
    <?php echo $form->textField($model, 'seo_keywords_oz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'seo_keywords_oz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'type'); ?>
    <?php echo $form->dropDownList($model, 'type', $model->listType(), array('empty' => '----', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'type'); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>