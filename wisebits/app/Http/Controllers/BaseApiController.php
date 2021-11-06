<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Response, JsonResponse};

/**
 * Class BaseApiController
 * @package App\Http\Controllers
 */
class BaseApiController extends Controller
{
    /**
     * @param array|string|mixed $data
     * @param int $code
     * @return JsonResponse
     */
    protected function sendResponse($data, $code = Response::HTTP_OK): JsonResponse
    {
        return \response()->json(
            [
                'data' => $data,
            ],
            $code
        );
    }

    /**
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    protected function sendSuccessResponse(array $data = [], $code = Response::HTTP_OK): JsonResponse
    {
        $data['isSuccess'] = true;

        return \response()->json($data, $code);
    }

    /**
     * @param array|string $error
     * @param int $code
     * @param array $debugData
     * @return JsonResponse
     */
    protected function sendError($error, $code = Response::HTTP_INTERNAL_SERVER_ERROR, $debugData = []): JsonResponse
    {
        $result = [
            'error' => $error,
            'isSuccess'  => false,
        ];

        if (!empty($debugData) && env('APP_DEBUG', false)) {
            $result['debug'] = $debugData;
        }

        return \response()->json($result, $code);
    }
}
