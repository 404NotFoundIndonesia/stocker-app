<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['nullable', Rule::unique('products', 'code')->ignore($this->id)],
            'name' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'current_stock' => ['required', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Kode',
            'name' => 'Nama Barang',
            'current_stock' => 'Stok',
            'unit' => 'Satuan',
        ];
    }
}
