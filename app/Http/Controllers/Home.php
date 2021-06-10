<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Banner;
use App\Models\Cake;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\Area;
use App\Models\District;
use Auth;
class Home extends Controller
{

    public function login(Request $r){
        if ($r->search == ""){
            $data = [
                'categories'=>Category::all(),
                'banners'=>Banner::where(array(['status','active']))->get(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>null,
            ];
            return view('login',$data);
        }
        else{
            $search = $r->input('search');
            $data = [
                'categories'=>Category::all(),
                'banners'=>Banner::where(array(['status','active']))->get(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('login',$data);
        }
    }
    public function index (Request $r){ 
        
        if(User::where([['id',Auth::id()],['isAdmin',1]])->exists()){
            return redirect()->route('adminDashboard');
        }
        elseif(User::where([['id',Auth::id()],['isVendor',1]])->exists()){
            return redirect()->route('vendorDashboard');
        }
        $area = $r->input('search');
        
        if ($r->search == ""){
            $data = [
                'categories'=>Category::all(),
                'banners'=>Banner::where(array(['status','active']))->get(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>null,
            ];
            return view('home', $data);
        }
        else{
            $search = $r->input('search');
            $fillter = Vendor::whereHas('area',function($query) use ($search){$query->where('pincode','like',$search);})->pluck('id');
            // $fillter= Vendor::join('areas', 'vendors.area_id', 'areas.id')
            // ->where('areas.pincode', 'LIKE', '%'. $r->search . '%')->get()->toArray();
            // $fillter= Vendor::join('areas', 'vendors.area_id', 'areas.id')->where('areas.pincode', 'LIKE', '%'. $r->search . '%')->firstOrFail();
            // $search = $r->input('search');
            // $fillter = Vendor::whereHas('area',function($query) use ($search){$query->where('pincode','like',$search);})->firstOrFail();
            $data = [
                'categories'=>Category::all(),
                'banners'=>Banner::where(array(['status','active']))->get(),
                // 'cakes'=>Cake::whereIn('vendor_id',$fillter)->get(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>Area::where('pincode',$search)->first(),
                
            ];
            return view('home',$data);
        }
    }
    
    public function fillter(Request $request, $cat_id){
        if ($request->search == ""){
            $data = [
                'categories'=>Category::all(),
                'cakes'=> Cake::where(array(['category_id', $cat_id]))->with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>null,
            ];
            return view('fillter', $data);
        }
        else{
            $search = $request->input('search');
            // $fillter = Vendor::whereHas('area',function($query) use ($search){$query->where('pincode','like',$search);})->pluck('id');
            $data = [
                'categories'=>Category::all(),
                'cakes'=> Cake::where(array(['category_id', $cat_id]))->with('children')->whereNull('parent_id')->limit(10)->get(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('fillter', $data);
        }
        
    }

    public function aboutus(Request $r){
        if ($r->search == ""){
            $data = [
                'categories'=>Category::all(),
                'area'=>null,
            ];
            return view('aboutus',$data);
        }
        else{
            $search = $r->input('search');
            $data = [
                'categories'=>Category::all(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('aboutus',$data);
        }
    }

    public function shop_cakes(Request $r){
        if ($r->search == ""){
            $data = [
                'categories'=>Category::all(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->get(),
                'area'=>null,
            ];
            return view('shop_cakes',$data);
        }
        else{
            $search = $r->input('search');
            $data = [
                'categories'=>Category::all(),
                'cakes'=>Cake::with('children')->whereNull('parent_id')->get(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('shop_cakes',$data);
        }
    }

    public function cake(Request $request, $cake_id){
        $cake = Cake::where(array(['id', $cake_id]))->firstOrFail();
        $area = $request->input('area');
        $data = [
            'categories'=>Category::all(),
            'cakes'=> Cake::where(array(['id', $cake_id]))->firstOrFail(),
            'related'=> Cake::where('category_id', '=', $cake->category->id)->where('id', '!=', $cake->id)->with('children')->whereNull('parent_id')->get(),
            'upgrade'=>Cake::where('id', '!=', $cake->id)->where('title', $cake->title)->get(),
            'area'=>Area::where('pincode',$area)->first(),
        ];
        return view('cake', $data);
    }

    public function search_area(Request $request, $cake_id){
        $cake = Cake::where(array(['id', $cake_id]))->firstOrFail();
        $area = $request->input('area');
        $search = Area::where('pincode',$area)->get();
        $data = [
            'categories'=>Category::all(),
            'cakes'=> Cake::where(array(['id', $cake_id]))->firstOrFail(),
            'related'=> Cake::where('category_id', '=', $cake->category->id)->where('id', '!=', $cake->id)->with('children')->whereNull('parent_id')->get(),
            'upgrade'=>Cake::where('id', '!=', $cake->id)->where('title', $cake->title)->get(),
            'area'=>Area::where('pincode',$area)->first(),
        ];
        return view('cake',$data);

    }

    public function search(Request $r){
        if ($r->search == ""){
            $search = $r->input('searching');
            // $key = trim($request->get('q'));

            $cakes = Cake::query()->where('title', 'like', "%{$search}%")->orWhere('category_id', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')->get();
            $data = [
                'categories'=>Category::all(),
                'cakes'=>$cakes,
                'area'=>null,
                
            ];
            return view('search',$data);
        }
        else{
            $search = $r->input('searching');
            // $key = trim($request->get('q'));

            $cakes = Cake::query()->where('title', 'like', "%{$search}%")->orWhere('category_id', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')->get();
            $data = [
                'categories'=>Category::all(),
                'cakes'=>$cakes,
                'area'=>Area::where('pincode',$search)->first(),
                
            ];
            return view('search',$data);
        }
    }

    public function cart(Request $r){
        if ($r->search == ""){
            $user_id = Auth::id();    
            $order = Order::where([['user_id',$user_id],['ordered',0]])->first();
            $orders = Order::where([['user_id',$user_id],['ordered',0]])->doesntExist();
            
            if ($orders){
                return redirect()->route('home');
            }
            $data = [
                "categories"=>Category::all(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'area'=>null
            ];
            return view('add_to_cart',$data);
        }
        else{
            $search = $r->input('search');
            $user_id = Auth::id();    
            $order = Order::where([['user_id',$user_id],['ordered',0]])->first();
            $orders = Order::where([['user_id',$user_id],['ordered',0]])->doesntExist();
            if ($orders){
                return redirect()->route('home');
            }
            $data = [
                "categories"=>Category::all(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('add_to_cart',$data);
        }
    
    }

    public function add_to_cart(Request $request,$cake_id){
        $user_id = Auth::id();
        $delivery_date = request('delivery_date');
        $isveg = request('isVeg');
        $message = request('message');
        $area = request('area');
        $delivery_time = request('delivery_time');
        $order = Order::firstOrCreate([
            'user_id'=>$user_id,
            'ordered'=>0,
        ]);
        $order->area = $area;
        $order->save();
        $oi = OrderItem::where(array(['order_id',$order->id],['cake_id',$cake_id]))->first();
        if($oi){
            $qty=$oi->qty+1;
            $oi->qty=$qty;
            $oi->save();
        }
        else{
            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->user_id=$user_id;
            $orderItem->ordered=0;
            $orderItem->cake_id=$cake_id;
            $orderItem->delivery_date=$delivery_date;
            $orderItem->isVeg=$isveg;
            $orderItem->message=$message;
            $orderItem->delivery_time=$delivery_time;
            $orderItem->qty=1;
            $orderItem->save();
        } 
        return redirect()->route('cart')->with('success','Item added successfully !!');
    }

    public function add_to_cart_details($cake_id){

        $user_id = Auth::id();
        $delivery_date = request('delivery_date');
        $isveg = request('isVeg');
        $order = Order::firstOrCreate([
            'user_id'=>$user_id,
            'ordered'=>0,
        ]);
        $oi = OrderItem::where(array(['order_id',$order->id],['cake_id',$cake_id]))->first();
        if($oi){
            $qty=$oi->qty+1;
            $oi->qty=$qty;
            $oi->save();
        }
        else{
            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->user_id=$user_id;
            $orderItem->ordered=0;
            $orderItem->cake_id=$cake_id;
            $orderItem->delivery_date=$delivery_date;
            $orderItem->isVeg=$isveg;
            $orderItem->qty=1;
            $orderItem->save();
        } 
        return redirect()->route('cart')->with('success','Item added successfully !!');

    }

    public function remove_Cart(Request $req,$cake_id){
        $user_id = Auth::id();    
        $cake = Cake::find($cake_id);
        if($cake){
            $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
            if($order){
               
                $oi= OrderItem::where([['user_id',$user_id],['ordered',false],["cake_id",$cake->id]])->first();
                if($oi){
                    if($oi->qty > 1){
                        $qty=$oi->qty-1;
                        $oi->qty=$qty;
                        $oi->save();
                    }
                    else{
                        return redirect()->route('removeitem',['id'=>$cake_id]);
                    }
                }
            }
            return redirect('cart')->with(['success' => 'Course removed successfully from your cart','alert'=>'alert-danger']);
        }
        else{
           return redirect()->back();
        }
    }

    public function removeitem($cake_id){
        $user_id = Auth::id(); 
        $cake = OrderItem::where(['cake_id'=>$cake_id])->delete();
        return redirect()->route('cart');
    }

    public function apply_coupon(){
        $user_id = Auth::id(); 
        $couponCode = request('coupon_code');
        $couponData = Coupon::where('code', $couponCode)->first();

        if($couponData) {
            $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
            $order->coupon_id = $couponData->id;
            $order->save();
            return redirect()->back()->with('success','coupon applied');
            // $order = Order::where(array(['user_id'=>$user_id],['ordered',0]))->get();
            // $order_id = Order::find($order);
            // $order_id->coupon_id = $couponData->id;
            // $order_id->save();
            // return redirect()->back()->with('success','coupon applied');
            
        }
        else{
            return back()->with('error','Coupon Does not Exist!');
        }
    }

    public function remove_coupon(){
        $user_id = Auth::id(); 
        
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        $order->coupon_id = null;
        $order->save();
        return redirect()->route('cart')->with('success','coupon removed');
        
    }

    public function checkout(Request $r){
        if ($r->search == ""){
            $user = Auth::id();
            $order = Order::where(array(['ordered',0],['user_id',$user]))->first();
            $data = [
                'country'=>Country::all(),
                'state'=>State::all(),
                'district'=>District::all(),
                'areas'=>Area::all(),
                "categories"=>Category::all(),
                'address'=>Address::where('user_id',$user)->get(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'area'=>null,
                'delivery_charge'=> Area::where('pincode',$order->area)->first(),
            ];
            return view('checkout',$data);
        }
        else{
            $search = $r->input('search');
            $user = Auth::id();
            $order = Order::where(array(['ordered',0],['user_id',$user]))->first();
            // $a = Order::select('area')->where('id',$order->id)->get();
            $delivery_charge = Area::where('pincode',$a)->first();
            $data = [
                'country'=>Country::all(),
                'state'=>State::all(),
                'district'=>District::all(),
                'areas'=>Area::all(),
                "categories"=>Category::all(),
                'address'=>Address::where('user_id',$user)->get(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'area'=>Area::where('pincode',$search)->first(),
                'delivery_charge'=> Area::where('pincode',$order->area)->first(),
            ];
            return view('checkout',$data);
        }
    }

    public function insert_address(Request $req){
        $req->validate([
            'name' => 'required',
            'contact' => 'required',
            'street' => 'required',
            'area_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);
        $user = Auth::id();
        $address = Address::Create([
         'name' => $req->name,
         'contact' => $req->contact,
         'contact2' => $req->contact2,
         'street' => $req->street,
         'area_id' => $req->area_id,
         'district_id' => $req->district_id,
         'state_id' => $req->state_id,
         'country_id' => $req->country_id,
         'user_id' => $user,
        ]);
 
        return redirect()->back();
    }

    public function order(Request $request){
        $user_id = Auth::id();
        $address_id = request('address');
        $delivery_type = request('delivery');
        $address = Address::where('id',$address_id)->first();
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        

        if($delivery_type == "Economy Delivery")
            $delivery_charge= Area::where('pincode',$order->area)->first();
        else
            $delivery_charge= 00;

        $order->address_id = $address->id;
        $order->delivery_type = $delivery_type;
        $order->delivery_charge = $delivery_charge->delivery_charge;
        // $orderItem = Order::find($order->id)->orderitem;
        // $order->ordered = True;
        // $order->isPending  = 1;
        // $orderItem->map(function ($oi){
        //     $oi->ordered = True;
        //     $oi->save();
        // });
        $order->save();
        return redirect()->route('place_order',$order->id);
    }

    public function place_order(Request $r,$order_id){
        if ($r->search == ""){
            $order = Order::find($order_id);
            $data = [
                'order'=>$order,
                "orderitem"=>Order::find($order->id)->orderitem,
                'categories'=>Category::All(),
                'area'=>null,
            ];
            return view('place_order',$data);
        }
        else{
            $search = $r->input('search');
            $order = Order::find($order_id);
            $data = [
                'order'=>$order,
                "orderitem"=>Order::find($order->id)->orderitem,
                'categories'=>Category::All(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('place_order',$data);
        }
    }

    public function confirm(Request $r){
        $user_id = Auth::id();
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        $orderItem = Order::find($order->id)->orderitem;
        $order->ordered = True;
        $order->isPending  = 1;
        $orderItem->map(function ($oi){
            $oi->ordered = True;
            $oi->save();
        });
        $order->save();

        if ($r->search == ""){
            $data = [
                'categories'=>Category::All(),
                'area'=>null,
            ];
            return view('confirm_order',$data);
        }
        else{
            $search = $r->input('search');
            $data = [
                'categories'=>Category::All(),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('confirm_order',$data);
        }
    }

    // public function add_to_cart(Request $request,$cake_id){
    //     $user_id = Auth::id();
       
    //         $order = Order::firstOrCreate([['user_id',$user_id],['ordered',false]]);
    //         if($order){
    //             $this->OrderItemCreation($user_id,$cake,$order);
    //         }
    //         else{
    //             $order = OrderItem::create(['user_id'=>$user_id],['cake_id',$cake->id]);
    //             $this->OrderItemCreation($user_id,$cake,$order);
    //         }
    //         return redirect('cart')->with(['message' => 'Cake added successfully in your cart']);
    //     }
    
    // }

    // private function OrderItemCreation($user_id,$cake,$order){
    //     $orderItem = OrderItem::where([['user_id',$user_id],['ordered',false],["cake_id",$cake->id]])->first();
    //     if(!$orderItem){
    //         $oi = new OrderItem();
    //         $oi->user_id = $user_id;
    //         $oi->cake_id = $cake->id;
    //         $oi->order_id = $order->id;
    //         $oi->save();
    //     }
    //     else{
    //         $qty=$orderItem->qty+1;
    //         $orderItem->qty=$qty;
    //         $orderItem->save();
    //     }
    // }

    // private function Check_coupon($code){
    //     $coupon = Coupon::where('code',$code)->first();
    //     if($coupon){
    //         return true;
    //     }
    //     return false;
        
    // }
    // private function Get_coupon($code){
    //     $coupon = Coupon::where('code',$code)->first();
    //     if($coupon){
    //         return $coupon;
    //     }
    //     return back()->with('error','Coupon Does not Exist!');
    // }
}