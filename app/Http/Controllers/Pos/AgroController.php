<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Agro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
Use Illuminate\Support\Str;

class AgroController extends Controller
{
    public function checkQuality(){
        $image = Agro::latest()->first();
        return view('backend.agro.product_image_upload',compact('image'));
    }

    public function uploadImage(Request $request){
        $image = $request->file('product_image');
        $name_gen = $image->getClientOriginalName();
        Image::make($image)->resize(200, 200)->save('upload/agro/' . $name_gen);
        $save_url = 'upload/agro/' . $name_gen;
        Agro::insert([
            'product_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return response()->json(['message' => 'Uploaded Successfully','product_image' => $save_url]);



        if (Str::contains($name_gen, 'fresh')) {
            $notification = array(
                'message' => 'Fresh Image',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else {
            $notification = array(
                'message' => 'Currupted Image',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

    }


}
