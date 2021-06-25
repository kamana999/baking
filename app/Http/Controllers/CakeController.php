<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cake;
use App\Models\Vendor;
use Auth;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories'=>Category::all(),
            'cakes'=>Cake::all(),
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
        ];
        return view('vendor.cake',$data);
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
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'weight'=>'required',
            'layer'=>'required',
            'flavour'=>'required',
            'description'=>'required',
            'isVeg'=>'required',
            'image'=>'required',
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);
        $vendor =1;
        $cake = new Cake();
        $cake->vendor_id = $vendor;
        $cake->category_id = $request->category_id;
        $cake->title = $request->title;
        $cake->price = $request->price;
        $cake->discount_price = $request->discount_price;
        $cake->weight = $request->weight;
        $cake->layer = $request->layer;
        $cake->flavour = $request->flavour;
        $cake->description = $request->description;
        $cake->isVeg = $request->isVeg;
        $cake->image = $filename;
        $cake->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
        $data = [
            'cake'=>$cake,
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.show_cake',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake)
    {
        $data= [
            'edits'=>$cake,
            'categories'=>Category::all(),
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
        ];
        return view('admin.edit_cake', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cake $cake)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'price'=>'required',
        // ]);
        if($request->image){
            
            $filename = time(). "." . $request->image->extension();
            $request->image->move(public_path("upload"), $filename);
            $cake->image = $filename;
        }
        else{
            $request->image == null;
        }
        
        $cake = $cake;
        $cake->category_id = $request->category_id;
        $cake->title = $request->title;
        $cake->price = $request->price;
        $cake->discount_price = $request->discount_price;
        $cake->weight_type = $request->weight_type;
        $cake->weight = $request->weight;
        $cake->layer = $request->layer;
        $cake->unit = $request->unit;
        $cake->shape = $request->shape;
        $cake->flavour = $request->flavour;
        $cake->serve = $request->serve;
        $cake->delivered = $request->delivered;
        $cake->description = $request->description;
       
        $cake->save();
        return redirect()->route('cake');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cake $cake)
    {
        $cake->delete();
        return redirect()->back();
    }
}
