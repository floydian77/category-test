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
    $categories = Category::all();
    foreach ($categories as $category) {
        $entryIds = $category->entries()->pluck('id');
        $entryIds = array_rand($entryIds->toArray(), rand(1, 4));

        $product->entries()->attach($entryIds);
    }
});
