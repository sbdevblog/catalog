<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */
namespace SbDevBlog\Catalog\Services;

use Magento\Catalog\Api\CategoryLinkManagementInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

class AddProductsToCategoriesService
{
    /**
     * @var CategoryLinkManagementInterface
     */
    private CategoryLinkManagementInterface $categoryLinkManagement;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Constructor For Service
     *
     * @param CategoryLinkManagementInterface $categoryLinkManagement
     * @param LoggerInterface $logger
     */
    public function __construct(
        CategoryLinkManagementInterface $categoryLinkManagement,
        LoggerInterface $logger
    ) {
        $this->categoryLinkManagement = $categoryLinkManagement;
        $this->logger = $logger;
    }

    /**
     * Add Products To Categories
     *
     * @param string $sku
     * @param array $categoryIds
     *
     * @return bool
     */
    public function addProductToCategories(string $sku, array $categoryIds):bool
    {
        try {
                $this->categoryLinkManagement->assignProductToCategories(
                    $sku,
                    $categoryIds
                );
                return true;
        } catch (CouldNotSaveException $e) {
            $this->logger->error($e->getMessage());
        }
        return false;
    }
}
