<?php

namespace Wisebits\interfaces\application\userService;

use Wisebits\interfaces\application\userService\models\UserInterface;

/**
 * Interface UserServiceInterface
 * @package Wisebits\interfaces\application\userService
 */
interface UserServiceInterface
{
    /**
     * @param int $id
     * @return UserInterface|null
     */
    public function getById(int $id): ?UserInterface;

    /**
     * @return UserInterface[]
     */
    public function getAll(): array;

    /**
     * @param array $data
     * @return UserInterface|null
     */
    public function save(array $data): ?UserInterface;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
