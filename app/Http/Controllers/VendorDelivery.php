<?php

namespace App\Http\Controllers;
use App\Models\Delivery_Person;
use App\Models\Vendor;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class VendorDelivery extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'staffs'=>Delivery_Person::where(array(['vendor_id', Auth::id()]))->get(),
        ];
        return view('vendor.delivery_person', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery_Person $delivery_boy)
    {
        $data = [
            'delivery'=>$delivery_boy,
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('vendor.show_delivery',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery_Person $delivery_boy)
    {
        $data = [
            'edits'=>$delivery_boy,
            'users'=>User::where(array(['isAdmin',0],['isVendor',0],['isStaff',1]))->get(),
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('vendor.edit_delivery',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Delivery_Person $delivery_boy)
    {
        if($request->image or $request->pancard or $request->bank_passbook or $request->driving_license){
            
            $filename = time(). "." . $request->image->extension();
            $pancards = time(). "." . $request->pancard->extension();
            $bank_passbooks = time(). "." . $request->bank_passbook->extension();
            $dl = time(). "." . $request->driving_license->extension();

            $request->image->move(public_path("upload"), $filename);
            $request->pancard->move(public_path("upload"), $pancards);
            $request->bank_passbook->move(public_path("upload"), $bank_passbooks);
            $request->driving_license->move(public_path("upload"), $dl);

            $staff->image = $filename;
            $staff->pancard = $pancards;
            $staff->bank_passbook =$bank_passbooks;
            $staff->driving_license =$dl;

        }
        else{
            $request->image == null;
            $request->pancard== null;
            $request->bank_passbook== null;
            $request->driving_license== null;
        }

        $staff = $delivery_boy;
        $staff->name = $request->input('name');
        $staff->contact = $request->input('contact');
        $staff->contact2 = $request->input('contact2');
        $staff->address = $request->input('address');
        $staff->aadhar_no = $request->input('aadhar_no');
        $staff->status = $request->input('status');
        $staff->work_time = $request->input('work_time');
        $staff->vehicle = $request->input('vehicle');
        $staff->user_id = $delivery_boy->user_id;
        $staff->vendor_id = $delivery_boy->vendor_id;
        $staff->save();
        return redirect()->route('delivery-boy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery_Person $delivery_boy)
    {
        $delivery_boy->delete();
        return redirect()->back();
    }
}
