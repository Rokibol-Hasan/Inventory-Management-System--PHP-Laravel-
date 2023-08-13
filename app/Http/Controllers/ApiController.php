<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\FlareClient\Api;

class ApiController extends Controller
{
    public function post(Request $request)
    {
        $data = $request->json()->all();
        $dataToInsert = [];
            $dataToInsert[] = [
                'd_name' => $data['class'],
                'd_confidence' => $data['confidence'],
            ];
        ApiModel::insert($dataToInsert);

        return response()->json(['message' => 'Data received successfully']);
    }
}
