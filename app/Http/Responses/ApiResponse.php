<?php
// app/Http/Responses/ApiResponse.php
namespace App\Http\Responses;

class ApiResponse
{
    public static function success($data = null, $status = 200, $meta = [])
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'data' => $data,
        ], $status);
    }

    public static function error($message, $status = 400, $code = null, $details = null)
    {
        $error = [
            'message' => $message
        ];

        if ($code) {
            $error['code'] = $code;
        }

        if ($details) {
            $error['details'] = $details;
        }

        return response()->json([
            'success' => false,
            'status' => $status,
            'error' => $error,
        ], $status);
    }

    public static function paginated($data, $meta = [])
    {
        return self::success(
            $data->items(),
            200,
            array_merge([
                'pagination' => [
                    'current_page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'total_pages' => $data->lastPage(),
                    'total_items' => $data->total()
                ],
                'links' => [
                    'self' => url()->current(),
                    'first' => $data->url(1),
                    'last' => $data->url($data->lastPage()),
                    'next' => $data->nextPageUrl(),
                    'prev' => $data->previousPageUrl()
                ]
            ], $meta)
        );
    }
}
