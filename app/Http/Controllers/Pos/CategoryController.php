<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryAll()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function categoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function categoryStore(Request $request)
    {
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => SupportCarbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }



    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }


    public function categoryUpdate(Request $request)
    {
        $category = $request->id;
        Category::findOrFail($category)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => SupportCarbon::now(),
        ]);

        $notification = array(
            'message' => 'Category updated sSuccessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }

    public function categoryDelete($id)
    {
        $categoryDelete = Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
