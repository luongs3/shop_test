<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        factory(App\Models\Admin::class, 10)->create();
        factory(App\Models\User::class, 10)->create();
        factory(App\Models\Category::class, 10)->create();
        factory(App\Models\Product::class, 10)->create()->each(function ($product) {
            $salePrice = round($product->price - $product->price * $product->sale_off / 100, 0);
            $product->save(['sale_price' => $salePrice]);
        });
        factory(App\Models\Attribute::class, 10)->create();
        factory(App\Models\AttributeProduct::class, 10)->create();
        factory(App\Models\AttributeValue::class, 10)->create();
        factory(App\Models\Post::class, 10)->create();
        factory(App\Models\Comment::class, 10)->create();
    }
}
