@extends('admin.base')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
            <h5 class="text-center">Order ID - {{$orders->id}}</h5>
            <h6 class="text-center">Customer Details - {$orders->address->name}}({{$orders->address->contact}}){{$orders->address->street}},{{$orders->address->area->name}}{{$orders->address->district->name}},({{$orders->address->state->name}})</h6>
            @if($orders->orderitem)
                @foreach($orders->orderitem as $oi)
                    <div class="card">
                        <div class="card-header">
                            <h6>{{$oi->cake->title}}</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('upload/'.$oi->cake->image)}}" alt="" width="100px" height="100px">
                                </div>
                                <div class="col-lg-6">
                                <h6>Qty- {{$oi->qty}}</h6>
                                <h6>Message- {{$oi->message}}</h6>
                                <h6>Delivery Date- {{$oi->delivery_date}}</h6>
                                <h6>Delivery Time- {{$oi->delivery_time}}</h6>
                                    @if($oi->cake->discount_price)
                                    <h6>Price per unit = {{$oi->cake->discount_price}} <del>{{$oi->cake->price}}</del></h6>
                                    @else
                                    <h6>Price per unit = {{$oi->cake->price}} </h6>
                                    @endif
                                @if($orders->coupon)
                                    @if($orders->coupon->type == 'percentage')
                                        <h6>Coupon Discount - {{$orders->coupon->value}}%</h6>
                                    @else
                                    <h6>Coupon Discount - {{$orders->coupon->value}}</h6>
                                    @endif
                                @endif
                                @if($oi->cake->discount_price)
                                <h5>Total Ammount = {{$oi->qty * $oi->cake->discount_price}} </h5>
                                @else
                                <h5>Total Ammount = {{$oi->qty * $oi->cake->price}} </h5>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    
</div>
@endsection