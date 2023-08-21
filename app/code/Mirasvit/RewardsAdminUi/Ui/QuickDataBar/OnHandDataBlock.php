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


declare(strict_types=1);

namespace Mirasvit\RewardsAdminUi\Ui\QuickDataBar;

use Magento\Backend\Block\Template;
use Mirasvit\Core\Ui\QuickDataBar\ScalarDataBlock;

class OnHandDataBlock extends ScalarDataBlock
{
    private $dataProvider;

    public function __construct(
        DataProvider     $dataProvider,
        Template\Context $context
    ) {
        $this->dataProvider = $dataProvider;

        parent::__construct($context);
    }

    public function getCode(): string
    {
        return 'rwp_points_on_hand';
    }

    public function getLabel(): string
    {
        return (string)__('Points On Hand');
    }

    public function getScalarValue(): string
    {
        $select = $this->dataProvider->getTransactionSelect();

        $value = (int)$this->dataProvider->getConnection()
            ->fetchOne($select);

        return number_format($value, 0, '.', ' ');
    }
}