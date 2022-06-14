<?php
/**
 * Copyright (c) 2020-2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedAdminUi\Block\Adminhtml;

use Magento\Backend\Block\Widget\Container;

/**
 * Class Cache
 */
class Cache extends Container
{
    /**
     * @return Container
     */
    protected function _prepareLayout()
    {
        $message = __('The cache for js bundling will be cleared. Are you sure that you want to flush it?');
        $this->buttonList->add(
            'potato_manager',
            [
                'label' => __('Flush Js Bundling'),
                'onclick' => 'confirmSetLocation(\'' . $message . '\', \'' . $this->getUrl('po_compressor/cache/flushJsBundling') . '\')',
                'class' => 'potato-manager',
                'options' => $this->getButtonOptions(),
            ]
        );

        return parent::_prepareLayout();
    }

    /**
     * @return array
     */
    private function getButtonOptions()
    {
        return [
            'purge-js' => [
                'id' => 'purge-js',
                'label' => __('Purge Js Cache'),
                'default' => false,
            ],
        ];
    }
}
