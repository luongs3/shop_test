<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class FeaturedCategoryController extends Controller
{
    protected $guard = 'client';
    const PER_PAGE = 4;

    public function index() {
        $fields = ['id', 'name', 'sku'];
        $featuredCategories = Category::with('products')
            ->isFeatured()
            ->limit(self::PER_PAGE)
            ->get($fields)
            ->map(function($category) {
                $category->chunk_products = $category->products->take(self::PER_PAGE);
                return $category->only('id', 'name', 'sku', 'chunk_products');
            });

        return [
            'featuredCategories' => $featuredCategories,
        ];
    }
}
