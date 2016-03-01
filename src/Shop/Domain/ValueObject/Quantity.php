<?php

namespace Shop\Domain\ValueObject;

class Quantity
{
    /**
     * @var int
     */
    private $value;

    public function __construct($value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException('Quantity must be greater or equal to 0');
        }

        $this->value = $value;
    }

    public function add(Quantity $addend)
    {
        return new self($this->value + $addend->value);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }
}
