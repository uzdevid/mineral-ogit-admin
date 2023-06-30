<?php

Yii::import('system.web.widgets.pagers.CLinkPager');

class TbLinkPager extends CLinkPager {

    public $firstPageCssClass = self::CSS_FIRST_PAGE;
    public $lastPageCssClass = self::CSS_LAST_PAGE;
    public $previousPageCssClass = self::CSS_PREVIOUS_PAGE;
    public $nextPageCssClass = self::CSS_NEXT_PAGE;
    public $internalPageCssClass = self::CSS_INTERNAL_PAGE;
    public $hiddenPageCssClass = self::CSS_HIDDEN_PAGE;
    public $selectedPageCssClass = 'active';
    public $maxButtonCount = 10;
    public $nextPageLabel = '<i class="fa fa-angle-double-right"></i>';
    public $prevPageLabel = '<i class="fa fa-angle-double-left"></i>';
    public $firstPageLabel = '<i class="fa fa-fast-backward"></i>';
    public $lastPageLabel = '<i class="fa fa-fast-forward"></i>';
    public $header = false;
    public $footer = '';
    public $cssFile = false;
    public $htmlOptions = array('class' => 'pagination justify-content-center', 'ajaxUpdate' => false);

    public function run() {
        $this->registerClientScript();
        $buttons = $this->createPageButtons();
        if (empty($buttons))
            return;
        echo $this->header;
        echo '<nav class="">';
        echo CHtml::tag('ul', $this->htmlOptions, implode("\n", $buttons));
        echo '</nav>';
        echo $this->footer;
    }

    protected function createPageButton($label, $page, $class, $hidden, $selected) {
        if ($hidden || $selected)
            $class .= ' ' . ($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
        return '<li class="page-item ' . $class . '">' . CHtml::link($label, $this->createPageUrl($page), array('class' => 'page-link')) . '</li>';
    }

}
