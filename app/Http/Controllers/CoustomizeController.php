<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Customize;

class CoustomizeController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'description'=>'required',
            'image'=>'required',
            'contact'=>'required'
        ]);
        if($request->hasFile('images')){
            foreach($request->file('images')as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path('upload'),$name);
                $data[] = $name;
            }
        }
        $filename1 = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename1);

        $user = Auth::id();

        $cake = new Customize();
        $cake->user_id = $request->user;
        $cake->ordered = true;
        $cake->name = $request->name;
        $cake->contact = $request->contact;
        $cake->weight_type = $request->weight_type;
        $cake->weight = $request->weight;
        $cake->description = $request->description;
        $cake->shape = $request->shape;
        $cake->flavour = $request->flavour;
        $cake->image = $filename1;
        $cake->images = json_encode($data);
        $cake->save();
        return redirect()->back();
    }
}
