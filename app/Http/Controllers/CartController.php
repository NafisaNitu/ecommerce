<?php

namespace App\Http\Controllers;

//use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;

        $products = DB::table('products')
            ->where('id', $id)
            ->first();

        $data['quantity'] = $quantity;
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['attributes'] = [$products->image];

//        Cart::add( $data);
        \Cart::add($data);
        cartArray();  //for global function using helper
        return redirect()->back();
    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
