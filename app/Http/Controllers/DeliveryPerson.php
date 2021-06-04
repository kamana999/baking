<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryPerson extends Controller
{
    public function index(Request $request, $vendor_id){
        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.delivery',$data);
    }
}
