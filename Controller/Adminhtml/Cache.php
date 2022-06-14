<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedAdminUi\Controller\Adminhtml;

use Magento\Backend\App\Action;

/**
 * Class Index
 */
abstract class Cache extends Action
{
    const ADMIN_RESOURCE = 'Hryvinskyi_PageSpeedAdminUi::pagespeed';
}
