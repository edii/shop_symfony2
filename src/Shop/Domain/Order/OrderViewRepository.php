<?php

namespace Shop\Domain\Order;

interface OrderViewRepository
{
    const LIMIT = 10;

    /**
     * @param int $page
     * @param array $orderBy
     * @param int $limit
     * @return array|OrderView[]
     */
    public function getAll($page = 1, array $orderBy = [], $limit = self::LIMIT);

    /**
     * @param string $id
     * @return OrderView
     */
    public function getById($id);

    /**
     * @param string $customerId
     * @return array
     */
    public function getByCustomer($customerId);
}