<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;
    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function newCategory(Request $request)
    {
        Category::saveData($request);
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function manageCategory()
    {
        return view('admin.category.manage', [
//            'categories' => Category::latest()->get(),
            'categories' => Category::latest()->simplePaginate(4),
        ]);
    }

    public function changeStatusCategory($id)
    {
        $this->category = Category::find($id);
        $this->category->status = $this->category->status == 1 ? 0 : 1;
        $this->category->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editCategory($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id)]);
    }

    public function updateCategory(Request $request, $id)
    {
        Category::updateData($request, $id);
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    public function deleteCategory($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
