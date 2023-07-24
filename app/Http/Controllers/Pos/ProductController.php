<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productAll(){
        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    }

    public function productAdd(){
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));
    }


    public function productStore(Request $request){
        Product::insert([
            'name'=>$request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity'=>'0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }


    public function productEdit($id){
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','supplier','unit','category'));
    }


    public function productUpdate(Request $request)
    {

        $productId = $request->id;
        Product::findOrFail($productId)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product updated sSuccessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }


    public function productDelete($id){
        Product::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product deleted sSuccessfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
