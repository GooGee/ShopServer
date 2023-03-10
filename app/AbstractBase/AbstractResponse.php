<?php

declare(strict_types=1);

namespace App\AbstractBase;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractResponse
{
    /**
     * @param object $item
     * @return array<string, mixed>
     */
    abstract static function getData($item): array;

    /**
     * @param array<int, object> $itemzz
     * @return array<int, array<string, mixed>>
     */
    static function getDatazz(array $itemzz): array
    {
        return array_map(function ($item) {
            return static::getData($item);
        }, $itemzz);
    }

    static function sendData(string $message, $data, int $code)
    {
        return new JsonResponse(compact('code', 'message', 'data'), $code);
    }

    static function sendItem(object $item, string $message = 'OK', int $code = 200)
    {
        $item = static::getData($item);
        return new JsonResponse(compact('code', 'message', 'item'), $code);
    }

    /**
     * @param array<int, object> $itemzz
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    static function sendItemzz(array $itemzz, string $message = 'OK', int $code = 200)
    {
        $itemzz = static::getDatazz($itemzz);
        return new JsonResponse(compact('code', 'message', 'itemzz'), $code);
    }

    static function sendOK($data = null)
    {
        return static::sendData('OK', $data, 200);
    }

    static function sendPage(LengthAwarePaginator $paginator, string $message = 'OK', int $code = 200)
    {
        $paginator->transform(function (object $item) {
            return static::getData($item);
        });
        return new JsonResponse([
            'code' => $code,
            'message' => $message,
            'page' => $paginator,
        ]);
    }

}