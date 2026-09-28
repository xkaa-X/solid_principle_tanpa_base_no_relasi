<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'stok' => (int) $this->stok,
            'created_at' => $this->created_at->toDateTimeString()
        ];
    }
}