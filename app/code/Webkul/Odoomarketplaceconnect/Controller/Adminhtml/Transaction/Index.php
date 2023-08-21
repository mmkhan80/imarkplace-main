<?php
namespace Webkul\Odoomarketplaceconnect\Controller\Adminhtml\Transaction;

/**
* Webkul Odoomarketplaceconnect Index Controller
* @category  Webkul
* @package   Webkul_Odoomarketplaceconnect
* @author    Webkul
* @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
* @license   https://store.webkul.com/license.html
*/

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Webkul_Odoomagentoconnect::manager';

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Webkul_Odoomagentoconnect::manager');
        $resultPage->addBreadcrumb(__('Transaction Store'), __('Transaction Store'));
        $resultPage->getConfig()->getTitle()->prepend(__("Seller's Transaction Mapping"));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webkul_Odoomarketplaceconnect::transaction_list');
    }
}
