<?php

use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use App\Models\AttributeValue;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'avatar' => 'images/user/default-avatar.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Admin::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => 'images/user/default-avatar.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'is_super' => $faker->randomElement([0,1]),
        'is_active' => $faker->randomElement([0,1]),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'sku' => $faker->unique()->slug(),
        'ancestor_id' => null,
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sku' => $faker->unique()->slug(),
        'description' => $faker->text(),
        'status' => $faker->randomElement([1, 2, 3]), //1- on-sale, 2-run out of stock, 3-disable
//        'category_id' => 1,
        'category_id' => function() {
            return factory(Category::class)->create()->id;
        },
        'price' => $faker->randomNumber(),
        'sale_off' => $faker->randomNumber(2),
        'brand' => $faker->company,
        'image' => config('common.default_product_image'),
        'extra_images' => null,
    ];
});

$factory->define(Attribute::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(50),
    ];
});

$factory->define(AttributeProduct::class, function (Faker $faker) {
    return [
        'product_id' => function() {
            return factory(Product::class)->create()->id;
        },
        'attribute_id' => function() {
            return factory(Attribute::class)->create()->id;
        },
    ];
});

$factory->define(AttributeValue::class, function (Faker $faker) {
    return [
        'value' => $faker->unique()->word,
        'attribute_id' => function() {
            return factory(Attribute::class)->create()->id;
        },
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'featured_image' => config('common.default_product_image'),
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'active' => $faker->randomElement([0, 1]),
    ];
});

$factory->define( Comment::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'ancestor_id' => 0,
        'commentable_type' => $faker->randomElement(['App\Models\Post', 'App\Models\Product']),
        'commentable_id' => function($comment) {
            return factory($comment['commentable_type'])->create()->id;
        },
        'active' => 1,
        'content' => $faker->text(),
    ];
});
