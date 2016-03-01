<?php

namespace Shop\Domain\ValueObject;

class UuidIdentity
{
    /**
     * @var string
     */
    private $value;

    public function __construct($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->getValue();
    }
}
