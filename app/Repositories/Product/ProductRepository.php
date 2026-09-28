<?php

namespace App\Repositories\Product;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection {
        return Product::all();
    }

    public function findById(int $id): ?Model {
        return Product::findOrFail($id);
    }

    public function create(array $data): ?Model {
        return Product::create($data);
    }

    public function update(int $id, array $data): ?Model {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool {
        $product = $this->findById($id);
        return $product->delete();
    }
}