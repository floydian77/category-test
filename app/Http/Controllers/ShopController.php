<?php


namespace App\Http\Controllers;


use App\Http\Resources\Shops;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with([
            'categories',
            'categories.entries'
        ])->get();

        return new Shops($shops);
    }
}
