<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Возвращает ответ в формате JSON без экранирования слэшей.
     *
     * @param $value
     *
     * @return JsonResponse
     */
    protected function jsonResponse($value): JsonResponse
    {
        return response()->json($value)
                         ->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
}
