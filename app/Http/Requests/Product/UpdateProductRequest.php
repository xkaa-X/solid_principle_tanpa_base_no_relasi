<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool {return true;}

    public function rules(): array {
        return [
            'nama_produk' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric|min:0',
            'stok' => 'sometimes|required|integer|min:0'
        ];
    }
}