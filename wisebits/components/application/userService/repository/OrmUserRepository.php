<?php

namespace Wisebits\application\userService\repository;

use App\Models\User as OrmUser;
use Wisebits\application\userService\models\User;
use Wisebits\infrastructure\common\traits\OrmRepositoryTrait;
use Wisebits\interfaces\application\userService\models\UserInterface;
use Wisebits\interfaces\application\userService\UserRepositoryInterface;

/**
 * Class OrmUserRepository
 * @package Wisebits\application\userService\repository
 */
class OrmUserRepository implements UserRepositoryInterface
{
    use OrmRepositoryTrait;

    /**
     * @param array $data
     * @return UserInterface
     */
    public function createModel(array $data): UserInterface
    {
        return new User($data);
    }

    /**
     * @param int $id
     * @return UserInterface|null
     */
    public function findById(int $id): ?UserInterface
    {
        $ormUser = $this->findOrmModelById($id);
        if (!$ormUser instanceof OrmUser) {
            return null;
        }

        return $this->createModel($ormUser->toArray());
    }

    /**
     * @return array
     */
    public function find(): array
    {
        $result = [];
        $ormModels = $this->findOrmModels();

        /** @var OrmUser $ormModel */
        foreach ($ormModels as $ormModel) {
            $result[] = $this->createModel($ormModel->toArray());
        }

        return $result;
    }

    /**
     * @param UserInterface $user
     * @return UserInterface|null
     */
    public function save(UserInterface $user): ?UserInterface
    {
        $ormModel = $this->saveOrmModelByData($user->toArray());
        if (!$ormModel instanceof OrmUser) {
            return null;
        }

        return $this->createModel($ormModel->toArray());
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->ormDelete($id);
    }
}
