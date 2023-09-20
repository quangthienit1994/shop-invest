<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function creating(Product $product): void
    {
        $this->checkUpdateSlug($product);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updating(Product $product): void
    {
        $this->checkUpdateSlug($product);
    }

    protected function checkUpdateSlug(Product $product)
    {
        if ($product->isDirty('slug')) {
            /**
             * TODO: Check duplicate before add to database
             */
            $product->slug = Str::slug($product->slug ?? $product->name, '-');
        }
    }
}
