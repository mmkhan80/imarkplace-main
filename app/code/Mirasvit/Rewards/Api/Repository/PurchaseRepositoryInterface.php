<?php
/**
 * Mirasvit
 *
 * This source file is subject to the Mirasvit Software License, which is available at https://mirasvit.com/license/.
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to http://www.magentocommerce.com for more information.
 *
 * @category  Mirasvit
 * @package   mirasvit/module-rewards
 * @version   3.0.48
 * @copyright Copyright (C) 2022 Mirasvit (https://mirasvit.com/)
 */



namespace Mirasvit\Rewards\Api\Repository;


interface PurchaseRepositoryInterface
{
    /**
     * @param int $orderId
     * @return \Mirasvit\Rewards\Api\Data\PurchaseInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($orderId);
}