<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function createProduct($attributes);
    public function getProduct($id);
    public function updateProduct($id, $newDetails);
    public function deleteProduct($id);

}