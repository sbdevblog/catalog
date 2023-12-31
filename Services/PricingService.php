<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */
namespace SbDevBlog\Catalog\Services;

use Magento\Framework\Pricing\Helper\Data as PricingHelper;

class PricingService
{

  /**
   * @var PricingHelper
   */
    protected PricingHelper $priceHelper;

  /**
   * Constructor
   *
   * @param PricingHelper $priceHelper
   */
    public function __construct(PricingHelper $priceHelper)
    {
        $this->priceHelper = $priceHelper;
    }

  /**
   * Get Formatted Price
   *
   * @param float $price
   *
   * @return string
   */
    public function getFormattedPrice(float $price):string
    {
        return $this->priceHelper->currency($price, true, false);
    }
}
