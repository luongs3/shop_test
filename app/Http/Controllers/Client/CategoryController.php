<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $guard = 'client';

    public function index() {
        $categories = Category::get()->load('descendants');

        return [
            'categories' => $categories,
        ];
    }

    public function show(Category $category)
    {
        $category = $category->load(['products']);

        return [
            'category' => $category,
        ];
    }
}
