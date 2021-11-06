<?php

use Illuminate\Contracts\Container\Container;
use Laravel\Lumen\Application;
use Wisebits\application\userService\repository\OrmUserRepository;
use Wisebits\application\userService\UserService;
use Wisebits\infrastructure\logService\LogService;
use Wisebits\interfaces\application\userService\UserRepositoryInterface;
use Wisebits\interfaces\application\userService\UserServiceInterface;
use Wisebits\interfaces\infrastructure\logService\LogServiceInterface;

/** @var Application $app */

$app->bind(UserServiceInterface::class, function (Container $container) {
    return new UserService(
        $container->make(UserRepositoryInterface::class),
        $container->make(LogServiceInterface::class)
    );
});

$app->bind(UserRepositoryInterface::class, function (Container $container) {
    return new OrmUserRepository();
});

$app->bind(LogServiceInterface::class, function (Container $container) {
    return new LogService();
});
