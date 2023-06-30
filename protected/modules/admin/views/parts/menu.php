<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo CHtml::normalizeUrl(['/admin/default']); ?>">
        <div class="sidebar-brand-text mx-3"><?php echo Yii::app()->name; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(['/admin/default']); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?php echo Yii::t("translation", "admin_panel"); ?></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <?php echo Yii::t("translation", "main_modules"); ?>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('user/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "users"); ?></span>           
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('product/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "products"); ?></span>           
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('category/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "categories"); ?></span>          
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('region/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "regions"); ?></span>           
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('exchange_product/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "exchange_products"); ?></span>           
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('exchange/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "exchange"); ?></span>           
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <?php echo Yii::t("translation", "system_modules"); ?>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo CHtml::normalizeUrl(array('translation/index')); ?>">
            <i class="fab fa-product-hunt"></i>
            <span><?php echo Yii::t("translation", "translations"); ?></span>          
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->