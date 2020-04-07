<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Entry;
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

$factory->define(Category::class, function (Faker $faker) {
    return [
    ];
});

$factory->afterCreating(Category::class, function ($category, $faker) {
    if ($category->parent_id == null) return;

    factory(Entry::class)->create([
        'category_id' => $category->id
    ]);
});
