<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

use App\Service\Admin\BrandCarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BrandCarController extends Controller
{
    protected $brandCarService;

    public function __construct(BrandCarService $brandCarService)
    {
        $this->brandCarService = $brandCarService;
    }

    public function index(): JsonResponse
    {
        $brands = $this->brandCarService->findAll();

        return ApiResponse::success($brands, 200);
    }

    public function detail(string $id): JsonResponse
    {
        $brands = $this->brandCarService->findOne($id);

        return ApiResponse::success($brands, 200);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'logo' => 'string'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validation failed',
                422,
                'VALIDATION_ERROR',
                $validator->errors()->toArray()
            );
        }

        $brand_car = $this->brandCarService->create([
            'name' => $request->name,
            'logo' => $request->logo
        ]);

        return ApiResponse::success($brand_car, 200);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'logo' => 'string'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validation failed',
                422,
                'VALIDATION_ERROR',
                $validator->errors()->toArray()
            );
        }

        $brand_car = $this->brandCarService->update($id, [
            'name' => $request->name,
            'logo' => $request->logo
        ]);

        $brand_car = $this->brandCarService->findOne($id);

        return ApiResponse::success($brand_car, 200);
    }

    public function delete(string $id): JsonResponse
    {
        $brands = $this->brandCarService->delete($id);

        return ApiResponse::success([], 200);
    }
}
