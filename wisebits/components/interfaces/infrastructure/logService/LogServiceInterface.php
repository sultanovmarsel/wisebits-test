<?php

namespace Wisebits\interfaces\infrastructure\logService;

/**
 * Interface LogServiceInterface
 * @package Wisebits\interfaces\infrastructure\logService
 */
interface LogServiceInterface
{
    /**
     * @param string $log
     */
    public function log(string $log): void;
}
