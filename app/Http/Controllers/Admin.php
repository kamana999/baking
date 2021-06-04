<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Cake;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Delivery_Person;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index (Request $r){ 

        if(User::where([['id',Auth::id()],['isVendor',1],['isAdmin',0]])->exists()){
            return redirect()->route('vendorDashboard');
        }
        elseif(User::where([['id',Auth::id()],['isVendor',1],['isAdmin',1]])->exists()){

        }
        // $vendor = Vendor::where('user_id',Auth::id())->firstOrFail();

        $data = [
            'categories'=>Category::all()->count(),
            'banners'=>Banner::all()->count(),
            // 'cakes'=>Cake::where(array(['vendor_id', $vendor->id]))->count(),
            // 'cake' => Cake::where(array(['vendor_id',$vendor->id]))->get(),
            'cakes'=>Cake::all()->count(),
            'cake'=>Cake::all(),
            'vendors'=>Vendor::all()->count(),
            'users'=>User::where(array(['isVendor',0],['isAdmin',0],['isStaff',0]))->count(),
            'vendor'=>Vendor::all(),  
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin/dashboard', $data);
    }

    public function vendor(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'isVendor' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'isVendor' => $request->input('isVendor'),
        ]);

        return redirect()->route('vendors.index');
        
    }

    public function vendorDetail(Request $request){
        $data = [
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'area'=>Area::all(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'users'=>User::where(array(['isVendor',1]))->get(),
        ];
        return view('admin/add_vendordetail',$data);
    }

    public function details(Request $request){
        $request->validate([
            'street'=>'required',
            'contact'=>'required|numeric|min:10',
            'street'=>'required|string',
            'country_id'=>'required',
            'state_id'=>'required',
            'area_id'=>'required',
            'district_id'=>'required',
            'user_id'=>'required',
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $vendor = new Vendor();
        $vendor->contact = $request->input('contact');
        $vendor->contact2 = $request->input('contact2');
        $vendor->description = $request->input('description');
        $vendor->street = $request->input('street');
        $vendor->country_id = $request->input('country_id');
        $vendor->state_id = $request->input('state_id');
        $vendor->district_id = $request->input('district_id');
        $vendor->area_id = $request->input('area_id');
        $vendor->user_id = $request->input('user_id');
        $vendor->image = $filename;
        $vendor->save();      
        return redirect()->route('adminDashboard');
    }

    public function cake(Request $request){
        $data = [
            'categories'=>Category::all(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'cake'=>Cake::all(),
            'cakes'=>Cake::with('children')->whereNull('parent_id')->get(),
        ];
        return view('admin.cake',$data);
    }

    public function create(Request $request){
        $data = [
            'cakes'=>Cake::with('children')->whereNull('parent_id')->get(),
            'categories'=>Category::all(),

            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            
        ];
        return view('admin.add_cake', $data);
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
        $cake->description = $request->description;
        $cake->shape = $request->shape;
        $cake->flavour = $request->flavour;
        $cake->serve = $request->serve;
        $cake->delivired = $request->delivired;
        $cake->parent_id = $request->parent_id;
        $cake->image = $filename;
        $cake->save();
        return redirect()->back();
    }

    public function editcake($id){
       
        $data= [
            'cakes'=>Cake::with('children')->whereNull('parent_id')->get(),
            'categories'=>Category::all(),
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'edits'=>Cake::findOrFail($id)
        ];
        return view('admin.edit_cake', $data);
    }

    public function updatecake(Request $request ,$id){

        $cake = Cake::findOrFail($id);

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
        $cake->description = $request->description;
        $cake->shape = $request->shape;
        $cake->flavour = $request->flavour;
        $cake->serve = $request->serve;
        $cake->delivired = $request->delivired;
        $cake->parent_id = $request->parent_id;
       
        $cake->save();

        return redirect()->route('admincake',$cake->vendor_id);
    }


    public function staff(Request $request){

        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'staffs'=>Delivery_Person::where(array(['vendor_id', Auth::id()]))->get(),
        ];
        return view('admin.delivery_person',$data);
    }

    public function createstaff(Request $request){
        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('admin.add_new_deliveryPerson', $data);
    }

    public function submitstaff(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'isStaff' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'isStaff' => $request->input('isStaff'),
        ]);

        return redirect()->route('submitform');
    }

    public function submitform(Request $request){
        $data = [
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'users'=>User::where(array(['isAdmin',0],['isVendor',0],['isStaff',1]))->get(),
        ];
        return view('admin.add_deliveryPerson_details',$data);
    }

    public function submitdetails(Request $request){
        $request->validate([
            'contact'=>'required|numeric|min:10',
            'address'=>'required|string',
            'name'=>'required|string',
            'aadhar_no'=>'required|string',
            'image'=>'required',
            'pancard'=>'required',
            'bank_passbook'=>'required',
            'driving_license'=>'required',
            'user_id'=>'required',
        ]);
        $user = Auth::id();
        $vendor = Vendor::where('user_id',$user)->firstOrFail();
       
        $filename = time(). "." . $request->image->extension();
        $pancards = time(). "." . $request->pancard->extension();
        $bank_passbooks = time(). "." . $request->bank_passbook->extension();
        $dl = time(). "." . $request->driving_license->extension();
        $request->image->move(public_path("upload"), $filename);
        $request->pancard->move(public_path("upload"), $pancards);
        $request->bank_passbook->move(public_path("upload"), $bank_passbooks);
        $request->driving_license->move(public_path("upload"), $dl);

        $staff = new Delivery_Person();
        $staff->name = $request->input('name');
        $staff->contact = $request->input('contact');
        $staff->contact2 = $request->input('contact2');
        $staff->address = $request->input('address');
        $staff->aadhar_no = $request->input('aadhar_no');
        $staff->status = $request->input('status');
        $staff->work_time = $request->input('work_time');
        $staff->vehicle = $request->input('vehicle');
        $staff->user_id = $request->input('user_id');
        $staff->vendor_id = $vendor->id;
        $staff->outForDelivery = 0;
        $staff->orderCompleted = 0;
        $staff->image = $filename;
        $staff->pancard = $pancards;
        $staff->bank_passbook =$bank_passbooks;
        $staff->driving_license =$dl;
        $staff->save();      
        return redirect()->route('adminDashboard');
    }

    public function orders(Request $request){
        $order = Order::where(array(['ordered',1],['isPending',1]))->first();
        $data = [
            'categories'=>Category::all()->count(),
            'vendor'=>Vendor::all(),  
            // 'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1]))->get(),
            // 'order'=>Order::find($order->id)->orderitem,
        ];
        return view('admin.orders',$data);
    }

    public function order_confirm(){
        $order = Order::where(array(['isConfirm',1],['ordered',1]))->first();
        $data = [
            'categories'=>Category::all()->count(),
            'vendor'=>Vendor::all(),
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'orderitem'=>Order::where(array(['isConfirm',1],['ordered',1]))->get(),
            // 'order'=>Order::find($order->id)->orderitem,
        ];
        return view('admin.order_confirm',$data);
    }

    public function cancle_order($order_id){
        $order = Order::find($order_id);
        $order->isPending = 0;
        $order->isCancle = 1;
        
        $order->save();
        $data = [
            'categories'=>Category::all()->count(),
            'vendor'=>Vendor::all(),  
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'orderitem'=>Order::where(array(['isCancle',1],['ordered',1]))->get(),
            // 'order'=>Order::find($order->id)->orderitem,
        ];
        return view('admin.cancle_order', $data);
    }
    public function cancle(){
        $data = [
            'categories'=>Category::all()->count(),
            'vendor'=>Vendor::all(),  
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'orderitem'=>Order::where(array(['isCancle',1],['ordered',1]))->get(),
            // 'order'=>Order::find($order->id)->orderitem,
        ];
        return view('admin.cancle_order', $data);
    }

    public function assign_delivery_boy($order_id){
        $order = Order::find($order_id);
        $delivery_boy = Delivery_Person::where('status','active')->get();
        $data = [
            'delivery'=>$delivery_boy,  
            'categories'=>Category::all()->count(),
            'vendor'=>Vendor::all(),  
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'order'=>$order,

        ];
        return view('admin.assign_delivery',$data);
    }
    public function submit_delivery_boy($order_id){
        $order = Order::find($order_id);
        $delivery = request('delivery');
        $delivery_boy = Delivery_Person::where('id',$delivery)->first();
        $d = Delivery_Person::find($delivery_boy->id);
        $order->delivery_id = $delivery_boy->id;
        $order->isConfirm = 1;
        $order->isPending = 0;
        $order->save();
        $d->status = "inactive";
        $d->save();
        return redirect()->route('order_confirm');
    }
}
