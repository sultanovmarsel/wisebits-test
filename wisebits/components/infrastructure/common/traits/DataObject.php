<?php

namespace Wisebits\infrastructure\common\traits;

/**
 * Trait DataObject
 * @package Wisebits\infrastructure\common\traits
 */
trait DataObject
{
    /** @var array */
    protected $data = [];

    /**
     * DataObject constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($this->keys as $key) {
            $this->data[$key] = null;

            if (!isset($data[$key])) {
                continue;
            }

            $this->data[$key] = $data[$key];
        }
    }

    public function __call($name, $args)
    {
        $propertyName = lcfirst(substr($name, 3));
        if ('get' === substr($name, 0, 3)) {
            if (in_array($propertyName, $this->keys) && isset($this->data[$propertyName])) {
                return $this->data[$propertyName];
            }
        } elseif ('set' === substr($name, 0, 3)) {
            if (in_array($propertyName, $this->keys) && !empty($args[0])) {
                $this->data[$propertyName] = $args[0];
            }
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
