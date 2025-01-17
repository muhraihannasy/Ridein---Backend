<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use BrandCarService;
use Illuminate\Http\Request;

class BrandCarController extends Controller
{
    protected $brandCarService;

    public function __construct(BrandCarService $brandCarService)
    {
        $this->brandCarService = $brandCarService;
    }

    public function index(): void
    {
        $brands = $this->brandCarService->findAll();

        ApiResponse::success($brands, _200);
    }
}
