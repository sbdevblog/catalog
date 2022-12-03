<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */

namespace SbDevBlog\Catalog\Controller\Products;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use SbDevBlog\Catalog\Controller\Products;

class Addtocart extends Products implements HttpPostActionInterface
{
    /**
     * Add Products TO Cart
     *
     * @return void
     */
    public function execute()
    {
        $productIds = explode(",", $this->request->getParam("product_ids"));

        if (count($productIds) > 0) {
            $this->addToCartServices->addProductToCart($productIds);
            $this->manager->addSuccessMessage(__("Products %1 added to cart", count($productIds)));
        }
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath("sbdevblog/products/view");
    }
}
