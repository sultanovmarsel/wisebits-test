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
        $user = $this->userRepository->createModel($data);
        $result = $this->userRepository->save($user);

        $this->log(UserLoggerFormatter::save($user, $result));

        return $result;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $result = $this->userRepository->delete($id);
        $this->log(UserLoggerFormatter::delete($id, $result));

        return $result;
    }

    /**
     * @todo: конечно если делать журналирование отдельно и необходимо гарантировать запись в журнал
     * необходимо делать иначе, с использованием транзакций, очередей и тд
     *
     * @param string $log
     */
    protected function log(string $log): void
    {
        $this->logService->log($log);
    }
}
