<?php
/***************************************************************************
 Extension Name	: Featured Products 
 Extension URL	: https://www.magebees.com/featured-products-extension-for-magento-2.html
 Copyright		: Copyright (c) 2016 MageBees, http://www.magebees.com
 Support Email	: support@magebees.com 
 ***************************************************************************/

namespace Magebees\Featuredproduct\Block\Adminhtml;

class DefaultXml extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return '<div style="background:#efefef;border:1px solid #d8d8d8;padding:10px;margin-bottom:10px;">
		<span>&lt;referenceContainer name="content"&gt;</br>&lt;block class="Magebees\Featuredproduct\Block\Featuredproduct" name="featuredproduct" ifconfig="featuredproduct/setting/enable"/&gt;</br>&lt;/referenceContainer&gt;</span>	
		</div>';
    }
}
