<?php

namespace App\Http\Requests\User;

use App\Rules\EmailBlackListRule;
use Wisebits\infrastructure\common\ErrorMap;

/**
 * Class StoreRequest
 * @package App\Http\Requests\User
 */
class StoreRequest extends BaseUserRequest
{
    protected const NAME_BLACK_LIST = [
        'admin',
        'operator',
    ];

    /**
     * @return string[]
     */
    public function rules(): array
    {
        $nameBlackListRule = $this->getNameBlackListRule();

        return [
            'name' => 'bail|required|max:255|min:8|' . $nameBlackListRule . '|regex:/^[\w\d]+$/|unique:users',
            'email' => [
                'bail',
                'required',
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
        ];
    }

    /**
     * @return array
     */
    public function getStoreData(): array
    {
        return [
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'notes' => $this->input('notes')
        ];
    }

    /**
     * @return string
     */
    protected function getNameBlackListRule(): string
    {
        return 'not_in:' . implode(',', self::NAME_BLACK_LIST);
    }
}
