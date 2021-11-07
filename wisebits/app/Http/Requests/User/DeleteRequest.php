<?php

namespace App\Http\Requests\User;

use Wisebits\infrastructure\common\ErrorMap;

/**
 * Class DeleteRequest
 * @package App\Http\Requests\User
 */
class DeleteRequest extends BaseUserRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'userId' => 'bail|required|integer|min:1|exists:users,id',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'userId.exists' => ErrorMap::USER_NOT_FOUND,
        ];
    }
}
