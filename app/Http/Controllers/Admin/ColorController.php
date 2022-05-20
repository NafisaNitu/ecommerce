<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    protected $color;
    public function addColor()
    {
        return view('admin.color.add');
    }

    public function newColor(Request $request)
    {
        Color::saveData($request);
        return redirect()->back()->with('message', 'Color Added Successfully');
    }

    public function manageColor()
    {
        return view('admin.color.manage', [
//            'categories' => Category::latest()->get(),
            'colors' => Color::latest()->simplePaginate(4),
        ]);
    }

    public function changeStatusColor($id)
    {
        $this->color = Color::find($id);
        $this->color->status = $this->color->status == 1 ? 0 : 1;
        $this->color->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editColor($id)
    {
        return view('admin.color.edit', [
            'color' => Color::find($id)
        ]);
    }

    public function updateColor(Request $request, $id)
    {
        Color::updateData($request, $id);
        return redirect()->back()->with('message', 'Color Updated Successfully');
    }

    public function deleteColor($id)
    {
        $this->color = Color::find($id);
        $this->color->delete();
        return redirect()->back()->with('message', 'Color deleted successfully');
    }
}
