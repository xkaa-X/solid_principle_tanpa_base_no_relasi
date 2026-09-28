<?php

namespace App\Services\Product;

use App\Contracts\Product\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    protected ProductRepositoryInterface $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts(): Collection {
        return $this->productRepo->getAll();
    }

    public function getProductbyId(int $id): ?Model {
        return $this->productRepo->findById($id);
    }

    public function createProduct(array $data): ?Model {
        return $this->productRepo->create($data);
    }

    public function updateProduct(int $id, array $data): ?Model {
        return $this->productRepo->update($id, $data);
    }

    public function deleteProduct(int $id): bool {
        return $this->productRepo->delete($id);
    }
}