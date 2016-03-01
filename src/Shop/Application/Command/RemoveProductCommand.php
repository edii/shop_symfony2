<?php

namespace Shop\Application\Command;

class RemoveProductCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * @inheritDoc
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}