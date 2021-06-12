<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryPerson extends Controller
{
    public function index(Request $request, $vendor_id){
        $data = [
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.delivery',$data);
    }
}
