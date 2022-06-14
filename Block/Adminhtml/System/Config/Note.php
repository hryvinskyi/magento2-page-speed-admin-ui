<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedAdminUi\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Note extends Field
{
    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $html = $this->_renderHtml();
        if (strlen($html) === 0) {
            return '';
        }
        return '<tr><td colspan="3" style="padding-top:15px;">' . $html . '</td></tr>';
    }

    /**
     * @return string
     */
    protected function _renderHtml()
    {
        $html = "";
        return '<div>' . $html . '</div>';
    }
}
