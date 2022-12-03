<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */

namespace SbDevBlog\Catalog\Services;

use Magento\Checkout\Model\Cart;

class AddToCartServices
{

    /**
     * @var Cart
     */
    private Cart $cart;

    /**
     * Constructor
     *
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Add Product To Cart
     *
     * @param array $productIds
     * @return void
     */
    public function addProductToCart(array $productIds):void
    {
        $this->cart->addProductsByIds($productIds);
        $this->cart->save();
    }
}
