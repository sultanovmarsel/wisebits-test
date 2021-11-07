<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

/**
 * Class DeleteRequest
 * @package App\Http\Requests\User
 */
class BaseApiRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Fix lumen bug
     *
     * @param mixed $keys
     * @return array
     */
    public function all($keys = null): array
    {
        $route = $this->route();

        return array_merge(parent::all(), !empty($route[2]) ? $route[2] : []);
    }
}
