<?php
/**
 * Webkul Software.
 *
 * @category Webkul
 * @package Webkul_MarketplaceLearningManagementSystem
 * @author Webkul
 * @copyright Copyright (c) Webkul Software Private Limited (https://webkul.com)
 * @license https://store.webkul.com/license.html
 */


namespace Webkul\MarketplaceLearningManagementSystem\Model\ResourceModel\CourseSection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webkul\MarketplaceLearningManagementSystem\Model\CourseSection as CourseSectionModel;
use Webkul\MarketplaceLearningManagementSystem\Model\ResourceModel\CourseSection;

/**
 * Course Section Collection
 */
class Collection extends AbstractCollection
{

    protected $_idFieldName = 'entity_id';

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(CourseSectionModel::class, CourseSection::class);
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
