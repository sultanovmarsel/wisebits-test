<?php

namespace Wisebits\interfaces\infrastructure\common;

/**
 * Interface ModelInterface
 * @package Wisebits\interfaces\infrastructure\common
 */
interface ModelInterface extends \JsonSerializable
{
    /** @return array */
    public function toArray(): array;
}
