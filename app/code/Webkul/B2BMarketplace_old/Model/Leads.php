<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_B2BMarketplace
 * @author    Webkul
 * @copyright Copyright (c) Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Webkul\B2BMarketplace\Model;

use Webkul\B2BMarketplace\Api\Data\LeadsInterface;
use Magento\Framework\DataObject\IdentityInterface as Identity;
use Magento\Framework\Model\AbstractModel;

class Leads extends AbstractModel implements LeadsInterface, Identity
{
    /**
     * No route page id.
     */
    const NOROUTE_ENTITY_ID = 'no-route';

    /**
     * Leads cache tag.
     */
    const CACHE_TAG = 'b2b_leads';

    /**
     * @var string
     */
    protected $_cacheTag = 'b2b_leads';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'b2b_leads';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Webkul\B2BMarketplace\Model\ResourceModel\Leads');
    }

    /**
     * Load object data.
     *
     * @param int|null $id
     * @param string   $field
     *
     * @return $this
     */
    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRouteItem();
        }

        return parent::load($id, $field);
    }

    /**
     * Load No-Route Leads.
     *
     * @return \Webkul\B2BMarketplace\Model\Leads
     */
    public function noRouteItem()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get identities.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    /**
     * Get ID.
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ID.
     *
     * @param int $id
     *
     * @return \Webkul\B2BMarketplace\Api\Data\LeadsInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * Saving product type related data and init index
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function afterSave()
    {
        $result = parent::afterSave();
        return $result;
    }
}
