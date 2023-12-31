<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */

namespace SbDevBlog\Catalog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddCustomPrice implements ObserverInterface
{
    private const SAMPLE_PRICE = 0;

    /**
     * ADD SAMPLE PRICE
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        $item->setCustomPrice(self::SAMPLE_PRICE);
        $item->setOriginalCustomPrice(self::SAMPLE_PRICE);
        $item->getProduct()->setIsSuperMode(true);
    }
}
