<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo Yii::t("translation", "admin_panel"); ?></h1>   
</div>

<!-- Content Row -->
<div class="row admin_panel_box">
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('user/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "users"); ?>               
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('product/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "products"); ?>               
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('category/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "categories"); ?>               
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('region/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "regions"); ?>             
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('exchange/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "exchange"); ?>             
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('translation/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <?php echo Yii::t("translation", "translations"); ?>             
            </div>
        </a>
    </div>
</div>