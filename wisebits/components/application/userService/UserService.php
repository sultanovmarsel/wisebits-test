<?php

namespace Wisebits\application\userService;

use Wisebits\interfaces\application\userService\models\UserInterface;
use Wisebits\interfaces\application\userService\UserRepositoryInterface;
use Wisebits\interfaces\application\userService\UserServiceInterface;
use Wisebits\interfaces\infrastructure\logService\LogServiceInterface;

/**
 * Class UserService
 * @package Wisebits\application\userService
 */
class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    protected LogServiceInterface $logService;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     * @param LogServiceInterface $logService
     */
    public function __construct(UserRepositoryInterface $userRepository, LogServiceInterface $logService)
    {
        $this->userRepository = $userRepository;
        $this->logService = $logService;
    }

    /**
     * @todo: add cache
     *
     * @param int $id
     * @return UserInterface|null
     */
    public function getById(int $id): ?UserInterface
    {
        return $this->userRepository->findById($id);
    }

    /**
     * @todo: add cache
     *
     * @return UserInterface[]
     */
    public function getAll(): array
    {
        return $this->userRepository->find();
    }

    /**
     * @param array $data
     * @return UserInterface|null
     */
    public function save(array $data): ?UserInterface
    {
        // TODO: Implement save() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}
