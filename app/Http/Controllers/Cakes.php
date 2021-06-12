<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cake;
use App\Models\Vendor;

use Illuminate\Http\Request;

class Cakes extends Controller
{
    
    public function index(Request $request){
        
        $data = [
            'categories'=>Category::all(),
            'cakes'=>Cake::all(),
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
            
        ];
        return view('vendor.cake',$data);
    }

    public function create(Request $request){
        $data = [
            'categories'=>Category::all(),
            'profile'=>Vendor::where(array(['user_id',Auth::id()]))->first(),
        ];
        return view('vendor.create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);
        $cake = new Cake();
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
        $cake->image = $filename;
        $cake->save();
        return redirect()->back();
    }
}
