<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use DB;

class PageViewController extends Controller
{
    public function home()
    {
        $categories = Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $products = Product::where('status', 1)->latest()->limit(12)->get();

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }

        return view('front.home.home', compact('categories','subcategories','brands','units','sizes','colors','products','topProducts'));
    }

    public function viewDetails($id)
    {

        $categories =  Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $product = Product::findOrFail($id);
        $sizes = Size::find($product->size_id);
        $colors = Color::find($product->color_id);
        $cat_id = $product->cat_id;
        $related_products = Product::where('cat_id',$cat_id)->limit(4)->get();

        return view('front.pages.view_details',compact('categories', 'subcategories', 'brands', 'units', 'product', 'sizes', 'colors', 'related_products'));
    }

    public function productByCat($id)
    {
        $categories =  Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->where('cat_id',$id)->limit(9)->get();

        return view('front.pages.product_by_cat', compact('categories', 'subcategories', 'brands', 'products'));
    }

    public function productBySubCat($id)
    {
        $categories =  Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->where('subcat_id',$id)->limit(9)->get();

        return view('front.pages.product_by_subcat', compact('categories', 'subcategories', 'brands', 'products'));
    }

    public function productByBrand($id)
    {
        $categories =  Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->where('br_id',$id)->limit(9)->get();

        return view('front.pages.product_by_brand', compact('categories', 'subcategories', 'brands', 'products'));
    }

    public function Search(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->where('name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id', $request->category);
        $products = $products->get();
        $categories =  Category::where('status', 1)->get();
        $subcategories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        return view('front.pages.product_by_subcat', compact('categories', 'subcategories', 'brands', 'products'));
    }

}
