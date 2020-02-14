<?php

namespace Showing\Skills\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
 
    /**
     * @param Context      $context
     * @param PageFactory  $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct(
            $context
        );
    }
 
    /**
     * Loads Layout
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
       $resultPage = $this->_resultPageFactory->create();
       $resultPage->addHandle('tech_test');
       
       return $resultPage;
    }
}