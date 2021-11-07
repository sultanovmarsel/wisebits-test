<?php

namespace Wisebits\application\userService;

use Wisebits\interfaces\application\userService\models\UserInterface;

/**
 * Class UserLoggerFormatter
 * @package Wisebits\application\userService
 */
class UserLoggerFormatter
{
    /**
     * @param UserInterface $startUser
     * @param UserInterface|null $resultUser
     * @return string
     */
    public static function save(UserInterface $startUser, ?UserInterface $resultUser): string
    {
        return 'Try to save:' . print_r($startUser->toArray(), true) . PHP_EOL . 'Result: '
             . ($resultUser instanceof UserInterface ? print_r($resultUser->toArray(), true) : 'error');
    }

    /**
     * @param int $id
     * @param bool $result
     * @return string
     */
    public static function delete(int $id, bool $result): string
    {
        return sprintf('Try to delete user = %d. Result: %s', $id, $result ? 'success' : 'error');
    }
}
