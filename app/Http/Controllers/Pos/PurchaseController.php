<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseAll()
    {
        $allPurchase = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.purchase_all', compact('allPurchase'));
    }

    public function purchaseAdd()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.purchase.purchase_add', compact('supplier', 'unit', 'category'));
    }

    public function purchaseStore(Request $request)
    {
        if ($request->category_id == null) {
            $notification = array(
                'message' => 'You do not inserted category!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }
        }
        $notification = array(
            'message' => 'Data saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.all')->with($notification);
    }


    public function purchaseDelete($id)
    {
        Purchase::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Data deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function purchasePending()
    {
        $allPurchase = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.purchase_pending', compact('allPurchase'));
    }

    public function purchaseApprove($id)
    {
        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if ($product->save()) {
            Purchase::findOrFail($id)->update([
                'status' => '1',
            ]);

            $notification = array(
                'message' => 'Purchase approvedd successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }
    }
}
