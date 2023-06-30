<?php if (isset($this->breadcrumbs)) { ?>
    <nav aria-label="breadcrumb">
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'homeLink' => '<li class="breadcrumb-item">' . CHtml::link(Yii::t("translation", "home"), array('/site/index')) . '</li>',
        ));
        ?>
    </nav>
<?php } ?>