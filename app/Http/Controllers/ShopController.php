<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with([
            'categories'
        ])->get();

        return response($shops->jsonSerialize(), Response::HTTP_OK);
    }
}
