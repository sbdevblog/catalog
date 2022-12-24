<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */

namespace SbDevBlog\Catalog\Services;

use Magento\Catalog\Block\Product\ListProduct;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Pricing\Helper\Data as PricingHelper;

class GetSimpleProductsServices
{

    /**
     * @var Collection
     */
    protected Collection $productCollection;

    /**
     * @var ListProduct
     */
    protected ListProduct $listProduct;

    /**
     * @var PricingHelper
     */
    protected PricingHelper $pricingHelper;

    /**
     * @var ImageHelper
     */
    protected ImageHelper $imageHelper;

    /**
     * Constructor
     *
     * @param CollectionFactory $productCollection
     * @param ListProduct $listProduct
     * @param PricingHelper $pricingHelper
     * @param ImageHelper $imageHelper
     */
    public function __construct(
        CollectionFactory $productCollection,
        ListProduct $listProduct,
        PricingHelper $pricingHelper,
        ImageHelper $imageHelper
    ) {
        $this->productCollection = $productCollection->create();
        $this->listProduct = $listProduct;
        $this->pricingHelper = $pricingHelper;
        $this->imageHelper = $imageHelper;
    }

    /**
     * Get Simple Products
     *
     * @return Collection
     */
    public function getSimpleProducts():Collection
    {
        return $this->productCollection->addAttributeToSelect("*")
                                ->addAttributeToFilter("type_id", Type::TYPE_SIMPLE);
    }

    /**
     * Get Add To Cart Url
     *
     * @param Product $product
     * @return string
     */
    public function getAddToCartUrl(Product $product):string
    {
        return $this->listProduct->getAddToCartUrl($product);
    }

    /**
     * Get Formatted Price
     *
     * @param float $price
     * @return string
     */
    public function getFormattedPrice($price):string
    {
        return $this->pricingHelper->currency($price, true, false);
    }

    /**
     * Get Product Image URL
     *
     * @param Product $product
     * @return string
     */
    public function getProudctImageUrl(Product $product):string
    {
        return $this->imageHelper->init($product, 'product_page_image_small')
            ->setImageFile($product->getFile())->resize(100, 100)->getUrl();
    }
}
