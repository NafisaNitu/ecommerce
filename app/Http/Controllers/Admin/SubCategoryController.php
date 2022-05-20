<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    protected $subcategory;
    public function addSubCategory()
    {
        return view('admin.subcategory.add' ,[
            'categories' => Category::where('status', 1)->get(),
        ]);
    }

    public function newSubCategory(Request $request)
    {
        SubCategory::saveData($request);
        return redirect()->back()->with('message', 'Sub Category Added Successfully');
    }

    public function manageSubCategory()
    {
        return view('admin.subcategory.manage', [
//            'newses' => News::latest()->get(),
            'subcategories' => SubCategory::latest()->simplePaginate(4),
//            'newses' => News::paginate(4),
        ]);
    }

    public function changeStatusSubCategory($id)
    {
        $this->subcategory = SubCategory::find($id);
        $this->subcategory->status = $this->subcategory->status == 1 ? 0 : 1;
        $this->subcategory->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editSubCategory($id)
    {
        return view('admin.subcategory.edit', [
            'subcategory' => SubCategory::find($id),
            'categories' => Category::where('status', 1)->get(),
            ]);
    }

    public function updateSubCategory(Request $request, $id)
    {
        SubCategory::updateData($request, $id);
        return redirect()->back()->with('message', 'Sub Category Updated Successfully');
    }

    public function deleteSubCategory($id)
    {
        $this->subcategory = SubCategory::find($id);
        $this->subcategory->delete();
        return redirect()->back()->with('message', 'Sub Category deleted successfully');
    }
}
