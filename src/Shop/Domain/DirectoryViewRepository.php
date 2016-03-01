<?php

namespace Shop\Domain;

interface DirectoryViewRepository
{
    /**
     * @return array|DirectoryView[]
     */
    public function getAll();

    /**
     * @return array
     */
    public function getAllIndexed();

    /**
     * @param $id
     * @return DirectoryView
     */
    public function getById($id);
}