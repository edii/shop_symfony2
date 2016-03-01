<?php

namespace Shop\InfrastructureBundle\Repository\Predis;

use Predis\Client;
use Shop\Domain\Product\ProductView;
use Shop\Domain\Product\ProductViewRepository as BaseProductViewRepository;

class ProductViewRepository implements BaseProductViewRepository
{
    const QUANTITY_KEY = 'products:%s:quantity';
    /**
     * @var Client
     */
    private $predis;
    /**
     * @var BaseProductViewRepository
     */
    private $repository;

    /**
     * @inheritDoc
     */
    public function __construct(Client $predis, BaseProductViewRepository $repository)
    {
        $this->predis = $predis;
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function findPaginatedByQueryAndCategory(
        $queryString = null,
        $category = null,
        $priceFrom = null,
        $priceTo = null,
        $availability = null
    )
    {
        return $this->repository->findPaginatedByQueryAndCategory(
            $queryString,
            $category,
            $priceFrom,
            $priceTo,
            $availability
        );
    }

    /**
     * @inheritdoc
     */
    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * @inheritdoc
     */
    public function findByIds(array $ids)
    {
        return $this->repository->findByIds($ids);
    }

    /**
     * @inheritdoc
     */
    public function getAvailability($id)
    {
        $key = sprintf(self::QUANTITY_KEY, $id);
        if (!$this->predis->exists($key)) {
            $value = $this->repository->getAvailability($id);
            $this->saveAvailability($id, $value);
        } else {
            $value = (int)$this->predis->get($key);
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function saveAvailability($id, $availability)
    {
        $key = sprintf(self::QUANTITY_KEY, $id);
        $this->predis->set($key, $availability);
    }

    /**
     * @inheritdoc
     */
    public function findPaginated($query, $options = [])
    {
        return $this->repository->findPaginated($query, $options);
    }

    /**
     * @inheritDoc
     */
    public function findAllIds()
    {
        return $this->repository->findAllIds();
    }
}