@extends('base')
@section('content')

<div class="container8">
        <h2 style="font-size: 50px; color: #e8bbb5;">Birthday Cakes</h2>
        <div class="row">
        @foreach($cakes as $c)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{route('cakes',$c->id)}}" class="image">
                            <img class="pic-1" src="{{url('upload',$c->image)}}">
                        </a>
                        <span class="product-discount-label">-33%</span>
                        <ul class="product-links">
                        @auth
                            <li><a href="{{route('add_to_cart',['id'=>$c->id])}}" data-tip="Add to Cart"><i class="fas fa-cart-plus"
                                        style="padding-left: 10px;"></i></a></li>
                            <li><a href="{{route('add_to_cart',['id'=>$c->id])}}" data-tip="Buy Now"><i class="fa fa-shopping-bag"
                                        style="padding-left: 10px;"></i></a></li>
                        @endauth
                        @guest
                        <li><a href="{{route('register')}}" data-tip="Add to Cart"><i class="fas fa-cart-plus"
                                        style="padding-left: 10px;"></i></a></li>
                            <li><a href="{{route('register')}}" data-tip="Buy Now"><i class="fa fa-shopping-bag"
                                        style="padding-left: 10px;"></i></a></li>
                        @endguest
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
                        <div class="price"><span>{{$c->price}}</span>{{$c->discount_price}}</div>
                        @if(@auth)
                        <a class="add-to-cart text-decoration-none" href="{{route('add_to_cart',['id'=>$c->id])}}">add to cart</a>
                        @else
                        <a class="add-to-cart text-decoration-none" href="{{route('register')}}">add to cart</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <br>
</div>
@endsection