<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
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

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->afterCreating(Shop::class, function ($shop, $faker) {
    factory(Category::class, 3)
        ->create()
        ->each(function($category) use ($shop) {
            $shop->categories()->attach($category);
        });

    factory(Product::class, 5)->create();
});
