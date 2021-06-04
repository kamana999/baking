<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Vendor;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            'category'=>Category::with('children')->whereNull('parent_id')->get(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories'=>Category::with('children')->whereNull('parent_id')->get(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin/add_category',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'cat_title'=>'required',
            'description'=>'required',
            'image'=>'required',
            'parent_id' => 'sometimes|nullable|numeric'
            
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $category = new Category();
        $category->cat_title = $request->cat_title;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->image = $filename;
        $category->save();

        return redirect()->route('categories.index');
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
    public function edit(Category $category)
    {
        $data= [
            'edits'=>$category,
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'categories'=>Category::with('children')->whereNull('parent_id')->get(),
        ];
        return view("admin.catedit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
        {   
            
            // $request->validate([
            // 'name' => 'required',
            // 'description' => 'required'
            // ]);
            if($request->image){
            
                $filename = time(). "." . $request->image->extension();
                $request->image->move(public_path("upload"), $filename);
                $category->image = $filename;
            }
            else{
                $request->image == null;
            }
        // $category = $category;
        // $category->cat_title = $request->cat_title;
        // $category->description = $request->description;
        // $category->save();
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}