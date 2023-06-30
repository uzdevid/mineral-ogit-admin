<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'new_password'); ?>
    <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'autocomplete' => 'off')); ?>
    <?php echo $form->error($model, 'new_password'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'surname'); ?>
    <?php echo $form->textField($model, 'surname', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'surname'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'phone'); ?>
    <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'phone'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'lang'); ?>
    <?php echo $form->dropDownList($model, 'lang', $model->listLang(), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'lang'); ?>
</div>

<div class="form-group image_form_group">
    <?php if ($model->image): ?>
        <div>
            <?php echo $model->LinkImage; ?>              
        </div>
    <?php endif; ?>

    <?php echo $form->labelEx($model, 'image'); ?>  
    <?php echo $form->fileField($model, 'image', array('class' => 'form-control')); ?>  
    <?php echo $form->error($model, 'image'); ?>
    <p style="margin: 0;"><?php echo Yii::t("translation", "recommended_photos_should_be_optimized"); ?></p>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>    