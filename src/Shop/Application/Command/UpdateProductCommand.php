<?php

namespace Shop\Application\Command;

class UpdateProductCommand extends CreateProductCommand
{
    /**
     * @inheritDoc
     */
    public function __construct(
        $id,
        $name,
        $price,
        $category,
        $description,
        $available,
        $imageUrl
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->available = $available;
        $this->imageUrl = $imageUrl;
    }
}