<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'product-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'category_id'); ?>
            <?php echo $form->dropDownList($model, 'category_id', $model->listCategory(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'category_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'title'); ?>
            <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', $model->listStatus(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'description'); ?>
            <?php echo $form->textArea($model, 'description', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'region_id'); ?>
            <?php echo $form->dropDownList($model, 'region_id', $model->listRegion(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'region_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'type'); ?>
            <?php echo $form->dropDownList($model, 'type', $model->listType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'type'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'price_1'); ?>
            <?php echo $form->textField($model, 'price_1', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'price_1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'price_2'); ?>
            <?php echo $form->textField($model, 'price_2', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'price_2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'price_3'); ?>
            <?php echo $form->textField($model, 'price_3', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'price_3'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'available_1'); ?>
            <?php echo $form->dropDownList($model, 'available_1', $model->listAvailable(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'available_1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'available_2'); ?>
            <?php echo $form->dropDownList($model, 'available_2', $model->listAvailable(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'available_2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'available_3'); ?>
            <?php echo $form->dropDownList($model, 'available_3', $model->listAvailable(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'available_3'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'delivery_type'); ?>
            <?php echo $form->dropDownList($model, 'delivery_type', $model->listDeliveryType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'delivery_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'location_type_1'); ?>
            <?php echo $form->dropDownList($model, 'location_type_1', $model->listLocationType(), array('empty' => '----', 'class' => 'form-control')); ?>  
            <?php echo $form->error($model, 'location_type_1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'location_type_2'); ?>
            <?php echo $form->dropDownList($model, 'location_type_2', $model->listLocationType(), array('empty' => '----', 'class' => 'form-control')); ?>  
            <?php echo $form->error($model, 'location_type_2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'location_type_3'); ?>
            <?php echo $form->dropDownList($model, 'location_type_3', $model->listLocationType(), array('empty' => '----', 'class' => 'form-control')); ?>  
            <?php echo $form->error($model, 'location_type_3'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'production_date_month'); ?>
            <?php echo $form->textField($model, 'production_date_month', array('class' => 'form-control', 'size' => 2, 'maxlength' => 2)); ?>
            <?php echo $form->error($model, 'production_date_month'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'production_date_year'); ?>
            <?php echo $form->textField($model, 'production_date_year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->error($model, 'production_date_year'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_type_1'); ?>
            <?php echo $form->dropDownList($model, 'payment_type_1', $model->listPaymentType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'payment_type_1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_type_2'); ?>
            <?php echo $form->dropDownList($model, 'payment_type_2', $model->listPaymentType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'payment_type_2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_type_3'); ?>
            <?php echo $form->dropDownList($model, 'payment_type_3', $model->listPaymentType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'payment_type_3'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'vat'); ?>
            <?php echo $form->dropDownList($model, 'vat', $model->listVat(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'vat'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'latitude'); ?>
            <?php echo $form->textField($model, 'latitude', array('class' => 'form-control', 'size' => 9, 'maxlength' => 9)); ?>
            <?php echo $form->error($model, 'latitude'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'longitude'); ?>
            <?php echo $form->textField($model, 'longitude', array('class' => 'form-control', 'size' => 9, 'maxlength' => 9)); ?>
            <?php echo $form->error($model, 'longitude'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'user_id'); ?>
            <?php echo $form->dropDownList($model, 'user_id', $model->listUser(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'contact_type'); ?>
            <?php echo $form->dropDownList($model, 'contact_type', $model->listContactType(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'contact_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image1'); ?>
            <?php echo $form->textField($model, 'image1', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'image1'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image2'); ?>
            <?php echo $form->textField($model, 'image2', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'image2'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image3'); ?>
            <?php echo $form->textField($model, 'image3', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'image3'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image4'); ?>
            <?php echo $form->textField($model, 'image4', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'image4'); ?>
        </div>
    </div>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>