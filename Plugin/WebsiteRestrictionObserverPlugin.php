<?php

namespace Punchout\LoginAsCustomerWebsiteRestriction\Plugin;

use Magento\Framework\App\RequestInterface;

class WebsiteRestrictionObserverPlugin
{
    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    private $request;

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function beforeExecute(\Magento\LoginAsCustomerWebsiteRestriction\Observer\WebsiteRestrictionObserver $subject, \Magento\Framework\Event\Observer $observer)
    {
        if ($this->request->getModuleName() == 'gateway') {
            $result = $observer->getResult();
            $result->setData('should_proceed', false);
        }
    }
}
