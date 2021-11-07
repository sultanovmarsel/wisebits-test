<?php

use App\Models\User as OrmUser;
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
        $container->make('journalLogger')
    );
});

$app->bind(UserRepositoryInterface::class, function () {
    return new OrmUserRepository(new OrmUser());
});

$app->bind('systemLogger', function () {
    return new LogService(storage_path('logs/logs.log'));
});

$app->bind('journalLogger', function () {
    return new LogService(storage_path('logs/journal.log'));
});
