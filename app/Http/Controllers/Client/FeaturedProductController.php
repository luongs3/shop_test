<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class FeaturedProductController extends Controller
{
    protected $guard = 'client';
    const PER_PAGE = 6;

    public function index() {
        $fields = ['name', 'sku', 'price', 'sale_price', 'sale_off', 'status', 'image', 'new'];
        $featuredProducts = Product::isFeatured()->limit(self::PER_PAGE)->get($fields);

        return [
            'featuredProducts' => $featuredProducts,
        ];
    }
}
