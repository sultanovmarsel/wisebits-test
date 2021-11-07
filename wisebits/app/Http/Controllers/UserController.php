<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
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

    /**
     * @param DeleteRequest $request
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function delete(DeleteRequest $request, UserServiceInterface $userService): JsonResponse
    {
        try {
            if ($userService->delete($request->getUserId())) {
                return $this->sendSuccessResponse();
            }
        } catch (\Throwable $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendErrorByCode();
    }

    /**
     * @param StoreRequest $request
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function store(StoreRequest $request, UserServiceInterface $userService): JsonResponse
    {
        try {
            $user = $userService->save($request->getStoreData());
        } catch (\Throwable $e) {
            return $this->sendError($e->getMessage());
        }

        if (!$user instanceof UserInterface) {
            return $this->sendErrorByCode();
        }

        return $this->sendSuccessResponse(['user' => $user->toArray()]);
    }

    /**
     * @param UpdateRequest $request
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, UserServiceInterface $userService): JsonResponse
    {
        try {
            $user = $userService->save($request->getUpdateData());
        } catch (\Throwable $e) {
            return $this->sendError($e->getMessage());
        }

        if (!$user instanceof UserInterface) {
            return $this->sendErrorByCode();
        }

        return $this->sendSuccessResponse(['user' => $user->toArray()]);
    }
}
