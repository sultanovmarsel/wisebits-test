<?php

namespace App\Http\Controllers;

use Wisebits\interfaces\application\userService\UserServiceInterface;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends BaseApiController
{

    public function index(UserServiceInterface $userService)
    {
        dd($userService->getById(1));
        //dd('aaa');
        //return $this->sendResponse($balanceService->getByNodeId($request->getNodeId(), $request->getCurrentUserId()));
    }
}
