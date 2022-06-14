<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedAdminUi\Block\Adminhtml\System\Config\Cache;

use Magento\Backend\Block\Widget\Button;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Clean extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element): string
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * @param AbstractElement $element
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $button = $this->getLayout()->createBlock(Button::class)->setData(
            [
                'id' => 'images_list',
                'label' => __('Flush Module Cache'),
                'class' => 'secondary',
                'onclick' => "setLocation('" . $this->getUrl('hryvinskyipagespeed/cache/clean') . "')",
            ]
        );
        return $button->toHtml();
    }
}
