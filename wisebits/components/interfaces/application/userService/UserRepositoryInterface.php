<?php

namespace Wisebits\interfaces\application\userService;

use Wisebits\interfaces\application\userService\models\UserInterface;

/**
 * Interface UserRepositoryInterface
 * @package Wisebits\interfaces\application\userService
 */
interface UserRepositoryInterface
{
    /**
     * @param array $data
     * @return UserInterface
     */
    public function createModel(array $data): UserInterface;

    /**
     * @param int $id
     * @return UserInterface|null
     */
    public function findById(int $id): ?UserInterface;

    /**
     * @todo: для возможности фильтрации можно добавить передачу параметров
     *
     * @return UserInterface[]
     */
    public function find(): array;

    /**
     * @param UserInterface $user
     * @return UserInterface|null
     */
    public function save(UserInterface $user): ?UserInterface;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
