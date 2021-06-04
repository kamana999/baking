<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Area;
use App\Models\Vendor;
use Auth;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'country'=> Country::all(),
            'state'=> State::all(),
            'district'=> District::all(),
            'area'=> Area::all(),
            'vendors'=>Vendor::all(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.vendor', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.vendordetails', $data);
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
    public function show(Vendor $vendor)
    {
        $data = [
            'vendors'=>$vendor,
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.showvendors',$data);
    }           

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $data = [
            'edits'=>$vendor,
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'area'=>Area::all(),
            'users'=>User::where(array(['isAdmin',0],['isVendor',1]))->get(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.edit_vendordetails',$data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        if($request->image){
            
            $filename = time(). "." . $request->image->extension();
            $request->image->move(public_path("upload"), $filename);
            $vendor->image = $filename;
        }
        else{
            $request->image == null;
        }

        $vendor = $vendor;
        $vendor->contact = $request->input('contact');
        $vendor->contact2 = $request->input('contact2');
        $vendor->description = $request->input('description');
        $vendor->street = $request->input('street');
        $vendor->country_id = $request->input('country_id');
        $vendor->state_id = $request->input('state_id');
        $vendor->district_id = $request->input('district_id');
        $vendor->area_id = $request->input('area_id');
        $vendor->user_id = $request->input('user_id');
        $vendor->save();      
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index');
    }
}
