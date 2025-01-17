<?php

namespace App\Http\Requests\Admin;

use App\Http\Responses\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_car_id' => 'required|exists:bran_cars,id',
            'model_car_id' => 'required|exists:model_cars,id',
            'name' => 'required|string|max:100',
            'place_number' => 'required|string|max:100',
            'year' => 'required|date',
            'price_per_day' => 'required|integer',
            'unit_avaible' => 'required|integer',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::error(
                'Validation failed',
                422,
                'VALIDATION_ERROR',
                $validator->errors()->toArray()
            )
        );
    }
}
