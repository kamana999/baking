<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Area;
use App\Models\Cake;
use App\Models\Category;
use App\Models\Delivery_Person;
use Auth;
use Illuminate\Http\Request;

class Vendors extends Controller
{
    //vendor dashboard/profile
    public function index (Request $request){ 
        if(User::where([['id',Auth::id()],['isAdmin',1]])->exists()){
            return redirect()->route('adminDashboard');
        }
        // elseif(User::where([['id',Auth::id()],['isVendor',0]])->exists()){
        //     return redirect()->route('home');
        // }
        elseif(Vendor::where('user_id', Auth::id())->doesntExist()){
            return redirect()->route('details');
        } 
        $vendor = Vendor::where('user_id',Auth::id())->firstOrFail();
        $data = [

            'categories'=>Category::all()->count(),
            'vendor'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'cakes'=>Cake::where(array(['vendor_id', $vendor->id]))->count(),
            'cake' => Cake::where(array(['vendor_id',$vendor->id]))->get(),
           
            
        ];
        return view('vendor.vendor',$data);
    }   
//vendor details
    public function details(){
        if(Vendor::where('user_id', Auth::id())->exists()){
            return redirect()->route('vendorDashboard');
        }
        $data = [
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'area'=>Area::all(),
        ];
        return view("vendor.vendordetails", $data);
    }

// detail form submit
    public function apply(Request $request){

        $request->validate([
            'street'=>'required',
            'contact'=>'required|numeric|min:10',
            'street'=>'required|string',
            'country_id'=>'required',
            'state_id'=>'required',
            'area_id'=>'required',
            'district_id'=>'required',
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
        $vendor->user_id = Auth::id();
        $vendor->image = $filename;
        $vendor->save();      
        return redirect()->route('vendorDashboard');
    }

// delivery boy

    public function staff(Request $request, $vendor_id){

        $data = [
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'staffs'=>Delivery_Person::where(array(['vendor_id', $vendor_id]))->get(),
        ];
        return view('vendor.delivery_person',$data);
    }

    public function createstaff(Request $request){
        $data = [
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
        ];
        return view('vendor.add_new_deliveryPerson', $data);
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
            'vendorss'=> Vendor::where('user_id',Auth::id())->firstOrFail(),
            'users'=>User::where(array(['isAdmin',0],['isVendor',0],['isStaff',1]))->get(),
        ];
        return view('vendor.add_deliveryPerson_details',$data);
    }

    public function submitdetails(Request $request, $vendor_id){
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

        $vendor = $vendor_id;
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
        $staff->vendor_id = $vendor;
        $staff->image = $filename;
        $staff->pancard = $pancards;
        $staff->bank_passbook =$bank_passbooks;
        $staff->driving_license =$dl;
        $staff->save();      
        return redirect()->route('vendorDashboard');
    }

    public function order(){
        $order = Order::where('ordered',1)->get();
        $vendor = Auth::id();
        $orderitem =  $$order->orderitem;
        $data = [
            ''
        ];

        return view('vendor.orders',$data);
    }
}
