<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'categories' => function ($query) {
                $query->where('parent_id', null);
            },
            'categories.childs',
            'categories.childs.entry'
        ])->get();

        return response($products->jsonSerialize(), Response::HTTP_OK);
    }
}
