<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Branch;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()->paginate(10, ["*"], $request->get('page', 1));
        return view('admin/pages/products', ["data" => $products]);
    }

    protected function view(Product $product){
        return view('admin/pages/product-edit', [
            "product" => $product,
            "branches" => Branch::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view(new Product());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $product = ProductService::save($data);
        return redirect()->route('admin.products.edit', $product)->with('success', 'Create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->view($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return $this->view($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Product $product)
    {
        $data = $request->validated();
        ProductService::save($data, $product);
        return redirect()->route('admin.products.edit', $product)->with('success', 'Update successfully');
    }

    /**
     * TODO: Should't delete, just trash
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
