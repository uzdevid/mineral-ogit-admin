<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'exchange-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-3">      
        <div class="form-group">
            <?php echo $form->labelEx($model, 'exchange_product_id'); ?>
            <?php echo $form->dropDownList($model, 'exchange_product_id', $model->listExchangeProduct(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'exchange_product_id'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'region_id'); ?>
            <?php echo $form->dropDownList($model, 'region_id', $model->listRegion(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'region_id'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'publish_time'); ?>
            <?php
            $this->widget('ext.EJuiDateTimePicker.EJuiDateTimePicker', array(
                'model' => $model,
                'attribute' => 'publish_time',
                // additional javascript options for the datetime picker plugin
                'options' => array(
                    'dateFormat' => 'dd-mm-yy',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control'
                ),
            ));
            ?>            
            <?php echo $form->error($model, 'publish_time'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'unit_value'); ?>
            <?php echo $form->textField($model, 'unit_value', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'unit_value'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'unit'); ?>
            <?php echo $form->textField($model, 'unit', array('class' => 'form-control', 'size' => 45, 'maxlength' => 45)); ?>
            <?php echo $form->error($model, 'unit'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'price_min'); ?>
            <?php echo $form->textField($model, 'price_min', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'price_min'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'price_max'); ?>
            <?php echo $form->textField($model, 'price_max', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'price_max'); ?>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'currency'); ?>
            <?php echo $form->textField($model, 'currency', array('class' => 'form-control', 'size' => 3, 'maxlength' => 3)); ?>
            <?php echo $form->error($model, 'currency'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php echo $form->dropDownList($model, 'status', $model->listStatus(), array('empty' => '----', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>      
    </div>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('translation', 'create') : Yii::t('translation', 'save'), array('class' => 'btn btn-primary')); ?>

<?php $this->endWidget(); ?>