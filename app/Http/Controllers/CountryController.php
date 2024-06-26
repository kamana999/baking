<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Country;
use Auth;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'countries' => Country::all(),
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
        ];
        return view('admin.country', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.add_country', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name'=>'required',
        ];
        $country = new Country();
        $country->name = $request->name;
        $country->code = $request->code;
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $data = [
            'edits'=>$country,
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.edit_country', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country = $country;
        $country->name = $request->name;
        $country->code = $request->code;
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->back();
    }
}
