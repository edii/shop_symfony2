<?php

namespace Shop\Domain\Product;

use Pagerfanta\Pagerfanta;

interface ProductViewRepository
{
    /**
     * @param string|null $queryString
     * @param string|null $category
     * @param int|null $priceFrom
     * @param int|null $priceTo
     * @param bool|null $availability
     * @return Pagerfanta
     */
    public function findPaginatedByQueryAndCategory(
        $queryString = null,
        $category = null,
        $priceFrom = null,
        $priceTo = null,
        $availability = null
    );

    /**
     * @param string $id
     * @return ProductView
     */
    public function findById($id);

    /**
     * @param array $ids
     * @return ProductView[]
     */
    public function findByIds(array $ids);

    /**
     * @param string $id
     * @return bool
     */
    public function getAvailability($id);

    /**
     * @param string $id
     * @param bool $availability
     * @return void
     */
    public function saveAvailability($id, $availability);

    /**
     * @param mixed $query
     * @param array $options
     * @return Pagerfanta
     */
    public function findPaginated($query, $options = []);

    /**
     * @return \Iterator
     */
    public function findAllIds();
}