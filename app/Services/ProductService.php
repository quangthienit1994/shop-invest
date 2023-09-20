<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public static function save(array $payload, Product | null $product = null)
    {
        if ($product) {
            $product->update($payload);
        } else {
            $product = new Product($payload);
            $product->save();
        }
        return $product;
    }
}
