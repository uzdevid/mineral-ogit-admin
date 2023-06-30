<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo Yii::t("translation", "welcome"); ?></h1>
</div>

<!-- Content Row -->
<div class="row admin_panel_box">
    <?php if (Yii::app()->user->role == 'administrator') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo CHtml::normalizeUrl(array('/admin/default')); ?>">
                <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                    <?php echo Yii::t("translation", "admin_panel"); ?>
                </div>
            </a>
        </div>
    <?php } ?>
    <?php if (Yii::app()->user->role == 'moderator') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo CHtml::normalizeUrl(array('/moderator/default')); ?>">
                <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                    <?php echo Yii::t("translation", "moderator_panel"); ?>
                </div>
            </a>
        </div>
    <?php } ?>   
    <?php if (Yii::app()->user->role == 'manager') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo CHtml::normalizeUrl(array('/manager/default')); ?>">
                <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                    <?php echo Yii::t("translation", "manager_panel"); ?>
                </div>
            </a>
        </div>
    <?php } ?>
    <?php if (Yii::app()->user->role == 'marketolog') { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo CHtml::normalizeUrl(array('/marketolog/default')); ?>">
                <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                    <?php echo Yii::t("translation", "marketolog_panel"); ?>
                </div>
            </a>
        </div>
    <?php } ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('/profile/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <span><i class="fas fa-user"></i> <?php echo Yii::t("translation", "profile"); ?></span>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('/profile/update')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <span><i class="fas fa-cogs"></i> <?php echo Yii::t("translation", "settings"); ?></span>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo CHtml::normalizeUrl(array('/logout/index')); ?>">
            <div class="card shadow h-100 p-2 font-weight-bold text-gray-800 h5 d-flex justify-content-center text-center">
                <span><i class="fas fa-sign-out-alt"></i> <?php echo Yii::t("translation", "logout"); ?></span>
            </div>
        </a>
    </div>
</div>