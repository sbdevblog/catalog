<?php

namespace SbDevBlog\Catalog\Controller;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use SbDevBlog\Catalog\Services\AddToCartServices;

class Products
{
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * @var ManagerInterface
     */
    protected ManagerInterface $manager;

    /**
     * @var ResultFactory
     */
    protected ResultFactory $resultFactory;

    /**
     * @var AddToCartServices
     */
    protected AddToCartServices $addToCartServices;

    /**
     * Constructor
     *
     * @param RequestInterface $request
     * @param ManagerInterface $manager
     * @param ResultFactory $resultFactory
     * @param AddToCartServices $addToCartServices
     */
    public function __construct(
        RequestInterface $request,
        ManagerInterface $manager,
        ResultFactory $resultFactory,
        AddToCartServices $addToCartServices
    ) {
        $this->request  = $request;
        $this->manager = $manager;
        $this->resultFactory = $resultFactory;
        $this->addToCartServices = $addToCartServices;
    }
}
