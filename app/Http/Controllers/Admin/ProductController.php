<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;

class ProductController extends Controller
{
    protected $product;
    public function addProduct()
    {
        return view('admin.product.add' ,[
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => SubCategory::where('status', 1)->get(),
            'brands' => Brand::where('status', 1)->get(),
            'units' => Unit::where('status', 1)->get(),
            'sizes' => Size::where('status', 1)->get(),
            'colors' => Color::where('status', 1)->get(),
        ]);
    }

    public function newProduct(Request $request)
    {
        Product::saveData($request);
        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function manageProduct()
    {
        return view('admin.product.manage', [
//            'newses' => News::latest()->get(),
            'products' => Product::latest()->simplePaginate(4),
//            'newses' => News::paginate(4),
        ]);
    }

    public function changeStatusProduct($id)
    {
        $this->product = Product::find($id);
        $this->product->status = $this->product->status == 1 ? 0 : 1;
        $this->product->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editProduct($id)
    {
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => SubCategory::where('status', 1)->get(),
            'brands' => Brand::where('status', 1)->get(),
            'units' => Unit::where('status', 1)->get(),
            'sizes' => Size::where('status', 1)->get(),
            'colors' => Color::where('status', 1)->get(),
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        Product::updateData($request, $id);
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function deleteProduct($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }
}
