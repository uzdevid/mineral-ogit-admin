<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'translation-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'translation_uz'); ?>
    <?php echo $form->textField($model, 'translation_uz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'translation_uz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'translation_oz'); ?>
    <?php echo $form->textField($model, 'translation_oz', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'translation_oz'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'translation_ru'); ?>
    <?php echo $form->textField($model, 'translation_ru', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'translation_ru'); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>
