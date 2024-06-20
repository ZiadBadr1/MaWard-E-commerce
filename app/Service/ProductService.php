<?php

namespace App\Service;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreImageAction;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getAll(): \LaravelIdea\Helper\App\Models\_IH_Product_C|\Illuminate\Pagination\LengthAwarePaginator|array
    {
        return Product::paginate(10);
    }

    public function create(array $attributes): Product
    {
        $images = $attributes['images'] ?? [];
        unset($attributes['images']);
        $product = Product::create($attributes);

        if (!empty($images)) {
            $this->storeImages($images, $product->id);
        }

        return $product;

    }

    public function update(array $attributes, Product $product): Product
    {
        $images = $attributes['images'] ?? [];
        unset($attributes['images']);

        $product->update($attributes);

        if (!empty($images)) {
            $this->storeImages($images, $product->id);
        }
        return $product;

    }

    public function delete(Product $product): void
    {
        $this->deleteOldImages($product);
        $product->delete();
    }


    protected function storeImages(array $images, int $productId):void
    {
        foreach ($images as $file) {
            $path = (new StoreImageAction())->execute($file, 'admin/product');
            ProductImage::create([
                'product_id' => $productId,
                'image' => $path,
            ]);
        }
    }

    protected function deleteOldImages(Product $product):void
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
    }
}