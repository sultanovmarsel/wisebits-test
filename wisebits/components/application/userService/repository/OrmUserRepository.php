<?php

namespace Wisebits\application\userService\repository;

use Wisebits\interfaces\application\userService\models\UserInterface;
use Wisebits\interfaces\application\userService\UserRepositoryInterface;

/**
 * Class OrmUserRepository
 * @package Wisebits\application\userService\repository
 */
class OrmUserRepository implements UserRepositoryInterface
{
    public function createModel(array $data): UserInterface
    {
        // TODO: Implement createModel() method.
    }

    public function findById(int $id): ?UserInterface
    {
        dd('qqq');
    }

    public function find(): array
    {
        // TODO: Implement find() method.
    }

    public function save(UserInterface $user): ?UserInterface
    {
        // TODO: Implement save() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

}
