<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductCategory;
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

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
    ];
});

$factory->afterCreating(ProductCategory::class, function ($productCategory, $faker) {
    $entries = $productCategory->category->entries;
    $entries = $entries->random(rand(1, count($entries)));
    $productCategory->entries()->attach($entries);
});
