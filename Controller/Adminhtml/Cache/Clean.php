<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedAdminUi\Controller\Adminhtml\Cache;

use Hryvinskyi\PageSpeedAdminUi\Controller\Adminhtml\Cache;
use Hryvinskyi\PageSpeedApi\Model\CacheInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Backend\App\Action;
use Magento\Framework\App\CacheInterface as AppCache;

/**
 * Class Clean
 */
class Clean extends Cache
{
    private AppCache $appCache;
    private File $file;
    private CacheInterface $cache;
    private ManagerInterface $eventManager;

    /**
     * @param Action\Context $context
     * @param AppCache $appCache
     * @param File $file
     * @param CacheInterface $cache
     * @param ManagerInterface $eventManager
     */
    public function __construct(
        Action\Context $context,
        AppCache $appCache,
        File $file,
        CacheInterface $cache,
        ManagerInterface $eventManager
    ) {
        parent::__construct($context);
        $this->appCache = $appCache;
        $this->file = $file;
        $this->cache = $cache;
        $this->eventManager = $eventManager;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        try {
            $this->appCache->clean([CacheInterface::CACHE_TAG]);
            $this->eventManager->dispatch('clean_hryvinskyi_pagespeed_cache');
            $this->file->deleteDirectory($this->cache->getRootCachePath());
            $this->messageManager->addSuccessMessage(__('Cache has been successfully cleaned'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong' . $e->getMessage()));
        }

        return $this->resultRedirectFactory->create()->setRefererUrl();
    }
}
