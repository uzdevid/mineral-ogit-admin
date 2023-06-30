<?php

Yii::import('system.zii.widgets.CMenu');

class AdminTopMenu extends CMenu {

    public function init() {
        if (isset($this->htmlOptions['id']))
            $this->id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $this->id;
        $route = $this->getController()->getRoute();
        $this->items = $this->normalizeItems($this->items, $route, $hasActiveChild);
    }

    /**
     * Calls {@link renderMenu} to render the menu.
     */
    public function run() {
        $this->renderMenu($this->items);
    }

    /**
     * Renders the menu items.
     * @param array $items menu items. Each menu item will be an array with at least two elements: 'label' and 'active'.
     * It may have three other optional elements: 'items', 'linkOptions' and 'itemOptions'.
     */
    protected function renderMenu($items) {
        if (count($items)) {
            echo CHtml::openTag('ul', $this->htmlOptions) . "\n";
            $this->renderMenuRecursive($items);
            echo CHtml::closeTag('ul');
        }
    }

    /**
     * Recursively renders the menu items.
     * @param array $items the menu items to be rendered recursively
     */
    protected function renderMenuRecursive($items) {
        $count = 0;
        $n = count($items);
        foreach ($items as $item) {
            $count++;
            $options = isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $class = array();
            if ($item['active'] && $this->activeCssClass != '')
                $class[] = $this->activeCssClass;
            if ($count === 1 && $this->firstItemCssClass !== null)
                $class[] = $this->firstItemCssClass;
            if ($count === $n && $this->lastItemCssClass !== null)
                $class[] = $this->lastItemCssClass;
            if ($this->itemCssClass !== null)
                $class[] = $this->itemCssClass;
            if ($class !== array()) {
                if (empty($options['class']))
                    $options['class'] = implode(' ', $class);
                else
                    $options['class'] .= ' ' . implode(' ', $class);
            }

            echo CHtml::openTag('li', $options);

            $menu = $this->renderMenuItem($item);
            if (isset($this->itemTemplate) || isset($item['template'])) {
                $template = isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template, array('{menu}' => $menu));
            } else
                echo $menu;

            if (isset($item['items']) && count($item['items'])) {
                echo "\n" . CHtml::openTag('ul', isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions) . "\n";
                $this->renderMenuRecursive($item['items']);
                echo CHtml::closeTag('ul') . "\n";
            }

            echo CHtml::closeTag('li') . "\n";
        }
    }

    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please see {@link items} on what data might be in the item.
     * @return string
     * @since 1.1.6
     */
    protected function renderMenuItem($item) {
        if (isset($item['url'])) {
            $item['linkOptions']['class'] = 'btn btn-outline-info';
            $label = $this->linkLabelWrapper === null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
            return CHtml::link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array('class' => 'btn btn-outline-info'));
        } else
            return CHtml::tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array('class' => 'btn btn-outline-info'), $item['label']);
    }

    /**
     * Normalizes the {@link items} property so that the 'active' state is properly identified for every menu item.
     * @param array $items the items to be normalized.
     * @param string $route the route of the current request.
     * @param boolean $active whether there is an active child menu item.
     * @return array the normalized menu items
     */
    protected function normalizeItems($items, $route, &$active) {
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            if (!isset($item['label']))
                $item['label'] = '';
            $encodeLabel = isset($item['encodeLabel']) ? $item['encodeLabel'] : $this->encodeLabel;
            if ($encodeLabel)
                $items[$i]['label'] = CHtml::encode($item['label']);
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $items[$i]['items'] = $this->normalizeItems($item['items'], $route, $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item, $route))
                    $active = $items[$i]['active'] = true;
                else
                    $items[$i]['active'] = false;
            }
            elseif ($item['active'])
                $active = true;
        }
        return array_values($items);
    }

    /**
     * Checks whether a menu item is active.
     * This is done by checking if the currently requested URL is generated by the 'url' option
     * of the menu item. Note that the GET parameters not specified in the 'url' option will be ignored.
     * @param array $item the menu item to be checked
     * @param string $route the route of the current request
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item, $route) {
        if (isset($item['url']) && is_array($item['url']) && !strcasecmp(trim($item['url'][0], '/'), $route)) {
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if (!isset($_GET[$name]) || $_GET[$name] != $value)
                        return false;
                }
            }
            return true;
        }
        return false;
    }

}
