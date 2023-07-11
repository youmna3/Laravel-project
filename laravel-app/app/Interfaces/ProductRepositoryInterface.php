<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();


    // public function createProduct($attributes, $imagePath);
    public function createProduct($attributes);
    public function addImageToProduct($product, $imagePath);


    // public function getProduct($id);

    public function updateProduct($id, $attributes);
    public function updateProductImage($id, $imagePath);

    public function deleteProduct($id);

}