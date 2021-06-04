<?php

namespace App\Http\Controllers;
use App\Models\Delivery_Person;
use App\Models\Vendor;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DeliveryPersonController extends Controller
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
        return view('admin.delivery_person', $data);
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
    public function show(Delivery_Person $delivery)
    {
        $data = [
            'delivery'=>$delivery,
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.show_delivery',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery_Person $delivery)
    {
        $data = [
            'edits'=>$delivery,
            'users'=>User::where(array(['isAdmin',0],['isVendor',0],['isStaff',1]))->get(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.edit_delivery',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery_Person $delivery)
    {
        if($request->image){
            $filename = time(). "." . $request->image->extension();
            $request->image->move(public_path("upload"), $filename);
            $delivery->image = $filename;
        }
        elseif($request->pancard){
            $pancards = time(). "." . $request->pancard->extension();
            $request->pancard->move(public_path("upload"), $pancards);
            $delivery->pancard = $pancards;
        }
        elseif($request->bank_passbook){
            $bank_passbooks = time(). "." . $request->bank_passbook->extension();
            $request->bank_passbook->move(public_path("upload"), $bank_passbooks);
            $delivery->bank_passbook =$bank_passbooks;
        }
        elseif($request->driving_license){
            $dl = time(). "." . $request->driving_license->extension();
            $request->driving_license->move(public_path("upload"), $dl);           
            $delivery->driving_license =$dl;
        }
        else{
            $request->image == null;
            $request->pancard== null;
            $request->bank_passbook== null;
            $request->driving_license== null;
        }

        $staff = $delivery;
        $staff->name = $request->input('name');
        $staff->contact = $request->input('contact');
        $staff->contact2 = $request->input('contact2');
        $staff->address = $request->input('address');
        $staff->aadhar_no = $request->input('aadhar_no');
        $staff->status = $request->input('status');
        $staff->work_time = $request->input('work_time');
        $staff->vehicle = $request->input('vehicle');
        $staff->user_id = $delivery->user_id;
        $staff->vendor_id = $delivery->vendor_id;
        $staff->save();
        return redirect()->route('delivery.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery_Person $delivery)
    {
        $delivery->delete();
        return redirect()->back();
    }
}
