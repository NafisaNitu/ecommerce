<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $brand;
    public function addBrand()
    {
        return view('admin.brand.add');
    }

    public function newBrand(Request $request)
    {
        Brand::saveData($request);
        return redirect()->back()->with('message', 'Brand Added Successfully');
    }

    public function manageBrand()
    {
        return view('admin.brand.manage', [
//            'categories' => Category::latest()->get(),
            'brands' => Brand::latest()->simplePaginate(4),
        ]);
    }

    public function changeStatusBrand($id)
    {
        $this->brand = Brand::find($id);
        $this->brand->status = $this->brand->status == 1 ? 0 : 1;
        $this->brand->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editBrand($id)
    {
        return view('admin.brand.edit', [
            'brand' => Brand::find($id)]);
    }

    public function updateBrand(Request $request, $id)
    {
        Brand::updateData($request, $id);
        return redirect()->back()->with('message', 'Brand Updated Successfully');
    }

    public function deleteBrand($id)
    {
        $this->brand = Brand::find($id);
        $this->brand->delete();
        return redirect()->back()->with('message', 'Brand deleted successfully');
    }
}
