<?php

namespace Wisebits\infrastructure\common;

/**
 * Class ErrorMap
 * @package Wisebits\infrastructure\common
 */
class ErrorMap
{
    public const USER_SAVE_ERROR = 'Ошибка сохранения пользователя';

    public const USER_DELETE_ERROR = 'Ошибка удаления пользователя';

    public const USER_NOT_FOUND = 'Пользователь не найден';

    public const USER_NAME_BANNED = 'Данное имя запрещено';

    public const EMAIL_DOMAIN_BANNED = 'Данный домен почты запрещен';
}
