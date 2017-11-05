<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    protected $guard = 'client';
    const PER_PAGE = 10;

    public function index() {
        $categories = Category::whereNull('ancestor_id')->get()->load('descendants');

        return [
            'categories' => $categories,
        ];
    }

    public function show(Category $category)
    {
        $page = request('page') ?: 1;
        $paginator = $category->products()->paginate(
            self::PER_PAGE,
            ['*'],
            'page',
            $page
        );

        return [
            'category' => $category,
            'products' => $paginator->items(),
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'total_pages' => $paginator->lastPage(),
                'last_page' => $paginator->lastPage(),
            ],
        ];
    }
}
