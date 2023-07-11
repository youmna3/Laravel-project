<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        // return Product::all();
        return Product::with('image')->get();
    }

    public function createProduct($attributes)
    {
        $product = Product::create($attributes);

        return $product;
    }
    public function addImageToProduct($product, $imagePath)
    {
        $product = $this->createProduct($product);
        $product->image()->createMany([['image_url' => $imagePath]]);
    }
    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }

    public function updateProduct($id, $attributes)
    {
        $product = Product::findOrFail($id);

        $product->update($attributes);

        return $product;
    }

    public function updateProductImage($id, $imagePath)
    {
        $product = Product::findOrFail($id);
        $images = $product->image;
        if ($images->isNotEmpty()) {
            // Update all existing images
            foreach ($images as $image) {
                $image->image_url = $imagePath;
                $image->save();
            }
        } else {
            // Add a new image
            $product->image()->createMany(['image_url' => $imagePath]);
        }

    }

    public function deleteProduct($id)
    {

        $product = Product::findOrFail($id);
        $images = $product->image;
        $product->delete();
        foreach ($images as $image) {
            Storage::delete($image->image_url);
            $image->delete();
        }

    }

}