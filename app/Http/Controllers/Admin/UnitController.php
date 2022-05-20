<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    protected $unit;
    public function addUnit()
    {
        return view('admin.unit.add');
    }

    public function newUnit(Request $request)
    {
        Unit::saveData($request);
        return redirect()->back()->with('message', 'Unit Added Successfully');
    }

    public function manageUnit()
    {
        return view('admin.unit.manage', [
//            'categories' => Category::latest()->get(),
            'units' => Unit::latest()->simplePaginate(4),
        ]);
    }

    public function changeStatusUnit($id)
    {
        $this->unit = Unit::find($id);
        $this->unit->status = $this->unit->status == 1 ? 0 : 1;
        $this->unit->save();
        return redirect()->back()->with('message', 'Status changed successfully');

    }

    public function editUnit($id)
    {
        return view('admin.unit.edit', [
            'unit' => Unit::find($id)]);
    }

    public function updateUnit(Request $request, $id)
    {
        Unit::updateData($request, $id);
        return redirect()->back()->with('message', 'Unit Updated Successfully');
    }

    public function deleteUnit($id)
    {
        $this->unit = Unit::find($id);
        $this->unit->delete();
        return redirect()->back()->with('message', 'Unit deleted successfully');
    }
}
