<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Wisebits\infrastructure\common\ErrorMap;

/**
 * Class EmailBlackListRule
 * @package App\Rules
 */
class EmailBlackListRule implements Rule
{
    protected const BLACK_LIST = [
        'frod.com',
        'spamer.com',
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $emailParts = explode('@', $value);
        if (sizeof($emailParts) !== 2) {
            return false;
        }

        if (empty($emailParts[1])) {
            return false;
        }

        return !in_array($emailParts[1], self::BLACK_LIST);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ErrorMap::EMAIL_DOMAIN_BANNED;
    }
}
