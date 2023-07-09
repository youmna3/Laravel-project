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
    public function createProduct($attributes)
    {
        return Product::create($attributes);

    }
    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }
    public function updateProduct($id, $newDetails)
    {
        // return Product::findOrFail($id);
        return Product::whereId($id)->update($newDetails);
    }
    public function deleteProduct($id)
    {
        // $product = Product::findOrFail($id);
        Product::findOrFail($id);
        return Product::destroy($id);

    }

}