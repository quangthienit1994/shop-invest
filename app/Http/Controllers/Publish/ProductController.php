<?php

namespace App\Http\Controllers\Publish;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function view(Product $product)
    {
        $product->load(['branch']);
        return view('theme.product', ["product" => $product]);
    }

    public function addToCart(AddToCartRequest $addToCartRequest)
    {
        $data = $addToCartRequest->validated();
        Cart::add($data);
        return redirect()->back();
    }
}
