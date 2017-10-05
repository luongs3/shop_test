<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class RecommendedProductController extends Controller
{
    protected $guard = 'client';
    const PER_PAGE = 6;

    public function index() {
        $products = Product::with('attributes')->limit(self::PER_PAGE)->get();

        return [
            'recommendedProducts' => $products,
        ];
    }
}
