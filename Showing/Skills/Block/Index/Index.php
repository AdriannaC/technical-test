<?php

namespace Showing\Skills\Block\Index;

use \Magento\Framework\View\Element\Template;
use \Magento\Catalog\Block\Product\Context;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use \Magento\Catalog\Helper\Image as HelperImage;
use \Magento\Framework\Pricing\Helper\Data as HelperPrice;
use \Magento\Customer\Model\Session as CustomerSession;;

class Index extends Template
{
     /** 
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /** 
     * @var \Magento\Catalog\Helper\Image 
     */
    protected $_imageHelper;

     /** 
     * @var \Magento\Framework\Pricing\Helper\Data 
     */
    protected $_priceHelper;

     /** 
     * @var CustomerSession
     */
    protected $_customerSession;

     /**
     * @param Context            $context
     * @param CollectionFactory  $productCollectionFactory
     * @param HelperImage        $imageHelper
     * @param HelperPrice        $priceHelper
     * @param CustomerSession    $customerSession
     */
    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,  
        HelperImage $imageHelper,
        HelperPrice $priceHelper,
        CustomerSession $customerSession,
        array $data = []
    ) {
        $this->_productCollectionFactory    = $productCollectionFactory;   
        $this->_imageHelper                 = $imageHelper;
        $this->_priceHelper                 = $priceHelper;
        $this->_customerSession             = $customerSession;

        parent::__construct($context, $data);
    }
    
    /**
     * Get Product Collection
     */
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(4);

        return $collection;
    }

    /**
     * Get Product Image URL
     * 
     * @return string
     */
    public function getItemImage($product)
    {
        $imageURL = $this->_imageHelper->init($product, 'product_base_image')->getUrl();
        
        return $imageURL;
    }

    /**
     * Get Product price
     * 
     * @return string
     */
    public function getPrice($product)
    {
       return $this->_priceHelper->currency($product->getPrice(), true, false);
    }

    /**
     * Checks if customer is logged in
     * 
     * @return boolean
     */
    public function isCustomerLoggedIn()
    {
        return $this->_customerSession->isLoggedIn();
    }

}