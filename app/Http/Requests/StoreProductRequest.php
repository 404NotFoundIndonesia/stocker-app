<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'code' => ['nullable', Rule::unique('products', 'code')],
            'name' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'initial_stock' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Kode',
            'name' => 'Nama Barang',
            'initial_stock' => 'Stok Awal',
            'unit' => 'Satuan',
        ];
    }
}
