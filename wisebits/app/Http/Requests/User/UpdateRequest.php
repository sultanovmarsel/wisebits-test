<?php

namespace App\Http\Requests\User;

use App\Rules\EmailBlackListRule;
use Wisebits\infrastructure\common\ErrorMap;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\User
 */
class UpdateRequest extends StoreRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        $nameBlackListRule = $this->getNameBlackListRule();

        return [
            'userId' => 'bail|required|integer|min:1|exists:users,id',
            'name' => 'bail|max:255|min:8|' . $nameBlackListRule . '|regex:/^[\w\d]+$/|unique:users',
            'email' => [
                'bail',
                'email',
                new EmailBlackListRule,
                'unique:users',
            ],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.not_in' => ErrorMap::USER_NAME_BANNED,
            'userId.exists' => ErrorMap::USER_NOT_FOUND,
        ];
    }

    /**
     * @return array
     */
    public function getUpdateData(): array
    {
        $updateData = [
            'id' => $this->getUserId(),
        ];

        $name = $this->input('name');
        if (!is_null($name)) {
            $updateData['name'] = $name;
        }

        $email = $this->input('email');
        if (!is_null($email)) {
            $updateData['email'] = $email;
        }

        $notes = $this->input('notes');
        if (!is_null($notes)) {
            $updateData['notes'] = $notes;
        }

        return $updateData;
    }

    /**
     * @return string
     */
    protected function getNameBlackListRule(): string
    {
        return 'not_in:' . implode(',', self::NAME_BLACK_LIST);
    }
}
