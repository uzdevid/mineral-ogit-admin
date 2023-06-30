<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'region-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

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

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>