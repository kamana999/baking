@extends('base')
@section('content')

<h1 class="mt-5">Your Order Has Been Placed..</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-5 mx-auto">
        <img src="{{asset('Images/Index/order.png')}}" alt="">
      
        <a href="{{route('home')}}" class="btn mb-5"style="background-color: #8ea47e; color: white;margin-left:150px"> Continue Shopping</a>
        </div>
    </div>
</div>
@endsection

