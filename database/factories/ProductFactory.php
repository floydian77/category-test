<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->afterCreating(Product::class, function ($product, $faker) {
    factory(Category::class, 3)->create([
        'product_id' => $product->id
    ])
        ->each(function ($category) use ($product) {
            factory(Category::class, 5)->create([
                'parent_id' => $category->id,
                'product_id' => $product->id,
            ]);
        });
});
