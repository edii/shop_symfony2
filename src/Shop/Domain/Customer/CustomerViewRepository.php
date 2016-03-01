<?php

namespace Shop\Domain\Customer;

interface CustomerViewRepository
{
    const LIMIT = 10;

    /**
     * @param int $page
     * @param array $orderBy
     * @param int $limit
     * @return array|CustomerView[]
     */
    public function getAll($page = 1, array $orderBy = [], $limit = self::LIMIT);

    /**
     * @param string $id
     * @return CustomerView
     */
    public function getById($id);

    /**
     * @param CustomerView $view
     */
    public function save(CustomerView $view);
}