<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();

        return response($products->jsonSerialize(), Response::HTTP_OK);
    }
}
