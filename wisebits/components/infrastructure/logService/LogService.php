<?php

namespace Wisebits\infrastructure\logService;

use Wisebits\interfaces\infrastructure\logService\LogServiceInterface;

/**
 * Class LogService
 * @package Wisebits\infrastructure\logService
 */
class LogService implements LogServiceInterface
{
    protected string $fileName;

    /**
     * LogService constructor.
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param string $log
     */
    public function log(string $log): void
    {
        file_put_contents($this->fileName, $this->decorate($log), FILE_APPEND);
    }

    /**
     * @param string $log
     * @return string
     */
    protected function decorate(string $log): string
    {
        return date('Y-m-d H:i:s ') . $log . PHP_EOL;
    }
}
