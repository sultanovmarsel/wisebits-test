<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;

/**
 * Class DeleteRequest
 * @package App\Http\Requests\User
 */
class BaseUserRequest extends BaseApiRequest
{
    /**
     * @return int
     */
    public function getUserId(): int
    {
        $data = $this->all();

        return (int) $data['userId'];
    }
}
