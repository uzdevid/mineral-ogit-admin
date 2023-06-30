<?php if (isset($this->breadcrumbs)) { ?>
    <nav aria-label="breadcrumb">
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'homeLink' => '<li class="breadcrumb-item">' . CHtml::link(Yii::t("translation", "admin_panel"), array('/admin/default/index')) . '</li>',
        ));
        ?>
    </nav>
<?php } ?>