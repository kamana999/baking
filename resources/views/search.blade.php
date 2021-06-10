@extends('base')

@section('content')
<div class="container8">
        <h2 style="font-size: 50px; color: #e8bbb5;">Birthday Cakes</h2>
        <div class="row">
        @foreach($cakes as $c)
            <div class="col-md-3 col-sm-6 mt-5">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{route('cakes',$c->id)}}" class="image">
                            <img class="pic-1" src="{{url('upload',$c->image)}}">
                        </a>
                        <span class="product-discount-label">-33%</span>
                        <ul class="product-links">
            
                        </ul>
                    </div>
                    <div class="product-content">
                        <ul class="rating">
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="far fa-star"></li>
                            <li class="far fa-star"></li>
                        </ul>
                        <h3 class="title"><a href="#" class="text-decoration-none">{{$c->title}}</a></h3>
                        @if($c->discount_price)
                        <h5 class=" h5 text-uppercase text-danger">₹{{ $c->discount_price }}  <del class="text-muted h6  ">₹ {{ $c->price }}</del></h5>
                        @else
                        <h5 class="mb-2 text-danger">₹{{ $c->price }}</5>
                        @endif
                        <p class="text-success">Get it {{$c->delivired}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <br>
</div>
@endsection