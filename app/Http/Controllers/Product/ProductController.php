<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use App\Traits\ApiResponseTrait;
use Exception;

class ProductController extends Controller
{
    //
    use ApiResponseTrait;

    protected UserService $userService;

    public function __construct(ProductService $productSerivce) {
        $this->productService = $productSerivce;
    }

    public function index() {
        try {
            $products = $this->productService->getAllProducts();
            return $this->successResponse(ProductResource::collection($products), 'berhasil mengambil data produk');
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal mengambil data produk');
        }
    }

    public function store(StoreProductRequest $request) {
        try {
            $product = $this->productService->createProduct($request->validated());
            return $this->successResponse(new ProductResource($product), 'produk berhasil di buat', 201);
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal membuat produk', 500);
        }
    }

    public function show(int $id) {
        try {
            $product = $this->productService->getProductById($id);
            return $this->successResponse(new ProductResource($product), 'berhasil mengambil detail produk', 200);
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal mengambil detail produk', 404);
        }
    }

    public function update(UpdateProductRequest $request, int $id) {
        try {
            $product = $this->productService->updateProduct($id, $request->validated());
            return $this->successResponse(new ProductResource($product), 'berhasil update produk', 200);
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal mengupdate produk', 400);
        }
    }

    public function destroy(int $id) {
        try {
            $product = $this->productService->deleteProduct($id);
            return $this->successResponse(null, 'berhasil menghapus produk');
        } catch (Exception $e) {
            return $this->errorResponse($e, 'gagal menghapus produk', 400);
        }
    }
}
