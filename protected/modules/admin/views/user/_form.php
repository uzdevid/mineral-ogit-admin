<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'phone'); ?>
    <div class="input-group">   
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">+998</span>
        </div>
        <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'size' => 9, 'maxlength' => 9)); ?>   
    </div>
    <?php echo $form->error($model, 'phone'); ?>
</div>

<?php if ($model->isNewRecord) { ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->textField($model, 'password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
<?php } else { ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'new_password'); ?>
        <?php echo $form->textField($model, 'new_password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'new_password'); ?>
    </div>
<?php } ?>

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
    <?php echo $form->labelEx($model, 'role'); ?>
    <?php echo $form->dropDownList($model, 'role', $model->listRole(), array('empty' => '----', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'role'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->dropDownList($model, 'status', $model->listStatus(), array('empty' => '----', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'status'); ?>
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

<div class="form-group">
    <?php echo $form->labelEx($model, 'organization_image'); ?>
    <?php echo $form->textField($model, 'organization_image', array('class' => 'form-control', 'size' => 18, 'maxlength' => 18)); ?>
    <?php echo $form->error($model, 'organization_image'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'organization_name'); ?>
    <?php echo $form->textField($model, 'organization_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'organization_name'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'organization_phone_number'); ?>
    <?php echo $form->textField($model, 'organization_phone_number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'organization_phone_number'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'inn'); ?>
    <?php echo $form->textField($model, 'inn', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'inn'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'mfo'); ?>
    <?php echo $form->textField($model, 'mfo', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'mfo'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'bank_info'); ?>
    <?php echo $form->textField($model, 'bank_info', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'bank_info'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'organization_about'); ?>
    <?php echo $form->textField($model, 'organization_about', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'organization_about'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'lang'); ?>
    <?php echo $form->dropDownList($model, 'lang', $model->listLang(), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'lang'); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>