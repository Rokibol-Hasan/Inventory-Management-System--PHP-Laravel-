<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Image;

class CustomerController extends Controller
{
    public function customerAll()
    {
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }

    public function customerAdd()
    {
        return view('backend.customer.customer_add');
    }

    public function customerStore(Request $request)
    {
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = 'upload/customer/' . $name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('customer.all')->with($notification);
    }


    public function customerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function customerUpdate(Request $request)
    {
        $customer = $request->id;
        if ($request->file('customer_image')) {
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
            $save_url = 'upload/customer/' . $name_gen;

            Customer::findOrFail($customer)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'customer_image' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer updated with image successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('customer.all')->with($notification);
        } else {
            Customer::findOrFail($customer)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer updated without image successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('customer.all')->with($notification);
        }
    }


    public function customerDelete($id)
    {
        $customer = Customer::findOrFail($id);
        $img = $customer->customer_image;
        if ($img == NULL) { //Condition added so that if image = null there is no unlink error
            Customer::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Customer deleted successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {
            unlink($img);
            Customer::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Customer deleted successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }



    public function creditCustomer(){
        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('allData'));
    }

    public function creditCustomerPrintPdf(){
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf', compact('allData'));
    }
}
