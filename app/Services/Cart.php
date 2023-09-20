<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class Cart
{

    public static function total()
    {
        $carts = Cart::all();
        $products = Product::query()->whereIn('id', $carts->pluck('product_id')->toArray())->select(['id', 'price'])->get();
        $mapProduct = collect();
        $products->map(fn ($product) => $mapProduct->put($product->id, $product->price));
        return $carts->reduce(function ($total, $cart) use ($mapProduct) {
            $price = $mapProduct->get($cart['product_id']);
            return $total += ($price * $cart['amount']);
        }, 0);
    }

    public static function detail()
    {
        $carts = Cart::all();
        $products = Product::query()->whereIn('id', $carts->pluck('product_id')->toArray())->select(['id', 'price', 'name', 'description'])->get();
        $mapProduct = collect();
        $products->map(fn ($product) => $mapProduct->put($product->id, $product));
        return $carts->map(function ($cart) use ($mapProduct) {
            $product = $mapProduct->get($cart['product_id']);
            return collect($product->toArray())->merge(['amount' => $cart['amount']]);
        }, 0);
    }

    public static function all()
    {
        $carts = Session::get('carts');
        return $carts ? collect(json_decode($carts, true)) : collect();
    }

    public static function delete($product_id)
    {
        $carts = Cart::all();
        $carts = $carts->filter(fn ($cart) => $cart['product_id'] != $product_id);
        Session::put('carts', $carts->toJson());
    }

    public static function set($product_id, $amount)
    {
        $carts = Cart::all();
        $cart = [
            "product_id" => (int) $product_id,
            "amount" => (int) $amount,
        ];
        $index = $carts->search(fn ($cart) => $cart['product_id'] === (int) $product_id);
        if ($index !== false) {
            /**
             * TODO: Can plus amount at here, old amount + new amount
             * Example:
             * - Product A exists in cart: amount = 1
             * - User add more amount: add 1
             * - Finaly, the amount is: 2
             */
            // $cart['amount'] = $cart['amount'] + $carts[$index]['amount'];
            $carts->put($index, $cart);
        } else {
            $carts->push($cart);
        }
        Session::put('carts', $carts->toJson());
    }

    public static function add(array $data)
    {
        if ($data['amount'] === '0') {
            Cart::delete($data['product_id']);
        } else {
            Cart::set($data['product_id'], $data['amount']);
        }
    }
}
