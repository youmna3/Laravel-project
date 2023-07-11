<?php
namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Image;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        // return Product::all();
        return Product::with('image')->get();
    }
    /*
    public function createProduct($attributes, $imagePath)
    {
        unset($attributes['image']);

        $product = Product::create($attributes);
        $image = new Image([
            'imageable_id' => $product->id,
            'imageable_type' => 'App\Models\Product',
            'image_url' => $imagePath
        ]);
        $product->image()->save($image);
        return $product;
        // return Product::create($attributes);

    }
    */
    public function createProduct($attributes)
    {
        $product = Product::create($attributes);

        return $product;
    }
    public function addImageToProduct($product, $imagePath)
    {
        $product = $this->createProduct($product);
        $image = new Image([
            'imageable_id' => $product->id,
            'imageable_type' => 'App\Models\Product',
            'image_url' => $imagePath
        ]);
        $product->image()->save($image);
    }
    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }
    // public function updateProduct($id, $newDetails)
    // {

    //     return Product::whereId($id)->update($newDetails);
    // }
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
            $product->image()->create(['image_url' => $imagePath]);
        }

    }

    public function deleteProduct($id)
    {
        // $product = Product::findOrFail($id);
        Product::findOrFail($id);
        return Product::destroy($id);

    }

}