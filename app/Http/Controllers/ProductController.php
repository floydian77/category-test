<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Http\Resources\Products;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'categories',
            'categories.category',
            'categories.entries',
        ])->get();

        return new Products($products);
    }
}
