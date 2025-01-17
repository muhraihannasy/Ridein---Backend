<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Service\Admin\CarService;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        $cars = $this->carService->findAll();

        return ApiResponse::success($cars, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = $this->carService->create($id);

        return ApiResponse::success($car, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = $this->carService->findOne($id);

        return ApiResponse::success($car, 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
