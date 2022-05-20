<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    protected $size;
    public function addSize()
    {
        return view('admin.size.add');
    }

    public function newSize(Request $request)
    {
        Size::saveData($request);
        return redirect()->back()->with('message', 'Size Added Successfully');
    }

    public function manageSize()
    {
        return view('admin.size.manage', [
//            'categories' => Category::latest()->get(),
            'sizes' => Size::latest()->simplePaginate(4),
        ]);
    }

    public function changeStatusSize($id)
    {
        $this->size = Size::find($id);
        $this->size->status = $this->size->status == 1 ? 0 : 1;
        $this->size->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editSize($id)
    {
        return view('admin.size.edit', [
            'size' => Size::find($id)
        ]);
    }

    public function updateSize(Request $request, $id)
    {
        Size::updateData($request, $id);
        return redirect()->back()->with('message', 'Size Updated Successfully');
    }

    public function deleteSize($id)
    {
        $this->size = Size::find($id);
        $this->size->delete();
        return redirect()->back()->with('message', 'Size deleted successfully');
    }
}
