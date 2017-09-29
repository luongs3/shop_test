<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    protected $guard = 'client';

    public function index() {
        $products = Product::with('attributes')->get();

        return [
            'products' => $products,
        ];
    }

    public function show(Product $product)
    {
        $product = $product->load(['attributes.attributeValues']);

        return [
            'product' => $product,
        ];
    }
}
