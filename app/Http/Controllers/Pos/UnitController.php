<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function unitAll()
    {
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('units'));
    }

    public function unitAdd()
    {
        return view('backend.unit.unit_add');
    }

    public function unitStore(Request $request)
    {
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => SupportCarbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }



    public function unitEdit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }


    public function unitUpdate(Request $request)
    {
        $unitId = $request->id;
        Unit::findOrFail($unitId)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => SupportCarbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit updated sSuccessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitDelete($id)
    {
        $unitDelete = Unit::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Unit deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
