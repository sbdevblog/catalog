<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */

namespace SbDevBlog\Catalog\Services;

use Magento\Catalog\Model\CategoryLinkRepository;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\StateException;
use Psr\Log\LoggerInterface;

class RemoveProductsFromCategories
{
    /**
     * @var CategoryLinkRepository
     */
    private CategoryLinkRepository $categoryLinkRepository;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Constructor For Service
     *
     * @param CategoryLinkRepository $categoryLinkRepository ,
     * @param LoggerInterface $logger
     */
    public function __construct(
        CategoryLinkRepository $categoryLinkRepository,
        LoggerInterface        $logger
    ) {
        $this->categoryLinkRepository = $categoryLinkRepository;
        $this->logger = $logger;
    }

    /**
     * Remove Product From Category
     *
     * @param int $categoryId
     * @param string $sku
     *
     * @return bool
     */
    public function removeProductsFromCategory(int $categoryId, string $sku): bool
    {
        try {
            return $this->categoryLinkRepository->deleteByIds($categoryId, $sku);
        } catch (CouldNotSaveException|InputException|StateException $e) {
            $this->logger->error($e->getMessage());
        }
        return false;
    }
}
