<?php

namespace App\Helper;

class ApiResponseHelper
{
    public static function success($data, string $message = 'Success', int $status = 200, array $meta = [], array $links = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null,
            'meta'    => self::meta($meta),
            'links'   => empty($links) ? null : $links,
        ], $status);
    }

    public static function error(string $message, int $status, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => null,
            'errors'  => $errors,
            'meta'    => self::meta(),
            'links'   => null,
        ], $status);
    }

    private static function meta(array $extra = []): array
    {
        return array_merge([
            'api_version' => config('app.api_version'),
            'timestamp'   => now()->toIso8601String(),
        ], $extra);
    }

    public static function fromPaginator($paginator): array
    {
        return [
            'meta' => [
                'pagination' => [
                    'current_page' => $paginator->currentPage(),
                    'per_page'     => $paginator->perPage(),
                    'total'        => $paginator->total(),
                    'last_page'    => $paginator->lastPage(),
                ]
            ],
            'links' => [
                'first' => $paginator->url(1),
                'last'  => $paginator->url($paginator->lastPage()),
                'prev'  => $paginator->previousPageUrl(),
                'next'  => $paginator->nextPageUrl(),
            ]
        ];
    }
}
