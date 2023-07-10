<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:50',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|max:2048|dimensions:min_width=100,min_height=100',


        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'description.required' => 'description is required!',
            'price.required' => 'price is required!'
        ];
    }
}