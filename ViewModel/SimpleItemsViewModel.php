<?php
namespace SbDevBlog\Catalog\ViewModel;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use SbDevBlog\Catalog\Services\GetSimpleProductsServices;

class SimpleItemsViewModel implements ArgumentInterface
{

    /**
     * @var GetSimpleProductsServices
     */
    private GetSimpleProductsServices $simpleProductsServices;

    /**
     * Constructor
     *
     * @param GetSimpleProductsServices $simpleProductsServices
     */
    public function __construct(
        GetSimpleProductsServices $simpleProductsServices
    ) {
        $this->simpleProductsServices = $simpleProductsServices;
    }

    /**
     * Get Simple Product Collection
     *
     * @return Collection
     */
    public function getSimpleProducts():Collection
    {
        return $this->simpleProductsServices->getSimpleProducts();
    }

    /**
     * Get Add To Cart Url
     *
     * @param Product $product
     * @return string
     */
    public function getAddToCartUrl(Product $product):string
    {
        return $this->simpleProductsServices->getAddToCartUrl($product);
    }

    /**
     * Formatted Price
     *
     * @param string $price
     * @return string
     */
    public function getFormmatedPrice($price):string
    {
        return $this->simpleProductsServices->getFormattedPrice($price);
    }

    /**
     * Get Product Image URl
     *
     * @param Product $product
     * @return string
     */
    public function getProudctImageUrl(Product $product):string
    {
        return $this->simpleProductsServices->getProudctImageUrl($product);
    }
}
