<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Wisebits\interfaces\application\userService\models\UserInterface;
use Wisebits\interfaces\application\userService\UserServiceInterface;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends BaseApiController
{
    /**
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function index(UserServiceInterface $userService): JsonResponse
    {
        return $this->sendResponse($userService->getAll());
    }

    /**
     * @param int $userId
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function show(int $userId, UserServiceInterface $userService): JsonResponse
    {
        $user = $userService->getById($userId);
        if ($user instanceof UserInterface) {
            return $this->sendResponse($user);
        }

        return $this->sendErrorByCode(Response::HTTP_NOT_FOUND);
    }
}
