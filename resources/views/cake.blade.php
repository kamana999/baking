@extends('base')
@section('content')


<div class="container-fluid">
        <div class="cart">
            <div class="row row1">
                <div class="col-md-4">
                    <img src="{{url('upload',$cakes->image)}}" width="100%" id="ProductImg">
                </div>
                <div class="col-md-6">
                    <h2 class="product-title">{{$cakes->title}}</h2>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <p>240 reviews</p>
                    </div>
                    <div class="price">
                        <span>₹{{$cakes->discount_price}}</span>
                        <span>₹{{$cakes->price}}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-4 sze">
                            <h5 style="color: #e8bbb5;">Weight</h5>
                            {{$cakes->weight}} {{$cakes->weight_type}}
                        </div>
                        <div class="col-md-4 qty">
                            <h5 style="color: #e8bbb5;">Quantity</h5>
                            {{$cakes->unit}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <h5 style="color: #e8bbb5;">Description</h5>
                    {{$cakes->description}}
                    </div>
                    <br>

                    @if($cakes->isCustomizable == 'yes')
                    <div class="container" style="position: absolute;">
                        <button type="button" class="btn" data-toggle="modal" data-target="#form1"
                            style="background-color: #8ea47e; color: #fff;">
                            <i class="fas fa-map-marker-alt"></i> Customize
                        </button>
                    </div>

                    <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="border-radius: 10px;">
                                <div class="modal-header border-bottom-0">
                                    <center>
                                        <h5 class="modal-title" id="exampleModalLabel">Customizable Information
                                        </h5>
                                    </center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="myradio">
                                            <input type="radio" name="myRadio" id="one1" class="myradio__input" checked>
                                            <label for="one1" class="myradio__label">Egg</label>
                                        </div>
                                        <div class="myradio">
                                            <input type="radio" name="myRadio" id="two2" class="myradio__input">
                                            <label for="two2" class="myradio__label">Eggless</label>
                                        </div>
                                        <div class="form-group" style="box-shadow: 2px solid #8ea47e;">
                                            <input type="text" class="form-control" id="password2"
                                                placeholder="Enter Pincode">
                                        </div>
                                        <div class="form-group" style="box-shadow: 2px solid #8ea47e;">
                                            <textarea type="text" class="form-control" id="password2"
                                                placeholder="Message on cake"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="submit" class="btn"
                                            style="background-color: #8ea47e; color: white;">Continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    @endif
                    <br>
                    <div class="buttons">
                        <div class="row">
                        @auth
                            <div class="col-md-6">
                                <a href="{{route('add_to_cart',['id'=>$cakes->id])}}" class="custom-btn text-decoration-none">Add To Cart <i class="fas fa-angle-right"></i></a>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="custom-btn text-decoration-none">Buy Now <i class="fas fa-angle-right"></i></a>
                            </div>
                        @endauth
                        @guest
                        <div class="col-md-6">
                                <a href="{{route('register')}}" class="custom-btn text-decoration-none">Add To Cart <i class="fas fa-angle-right"></i></a>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="custom-btn text-decoration-none">Buy Now <i class="fas fa-angle-right"></i></a>
                            </div>
                        @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="container">
        <h3 style="text-align: left; color: #8ea47e;">Customer reviews</h3>
    </div>
<section class="customer-ratings">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="customerratings" class="owl-carousel">
                        <div class="item">
                            <div class="shadow-effect-3">
                                <div class="course-preview1">
                                    <img src="{{asset('Images/Index/customer-reviews.png')}}" height="100px" width="100px">
                                </div>
                                <div class="card-body">
                                    <p style="color: palevioletred;">"Thank you so much really happy
                                        with your service withe work you guys are doing all the gifts I
                                        recievd are worthy it"</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="shadow-effect-3">
                                <div class="course-preview1">
                                    <img src="Images/Index/customer-reviews.png" height="100px" width="100px">
                                </div>
                                <div class="card-body">
                                    <p style="color: palevioletred;">"Thank you so much really happy
                                        with your service withe work you guys are doing all the gifts I
                                        recievd are worthy it"</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="shadow-effect-3">
                                <div class="course-preview1">
                                    <img src="Images/Index/customer-reviews.png" height="100px" width="100px">
                                </div>
                                <div class="card-body">
                                    <p style="color: palevioletred;">"Thank you so much really happy
                                        with your service withe work you guys are doing all the gifts I
                                        recievd are worthy it"</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="shadow-effect-3">
                                <div class="course-preview1">
                                    <img src="Images/Index/customer-reviews.png" height="100px" width="100px">
                                </div>
                                <div class="card-body">
                                    <p style="color: palevioletred;">"Thank you so much really happy
                                        with your service withe work you guys are doing all the gifts I
                                        recievd are worthy it"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <hr>
    </hr>
    <div class="container">
        <h3 style="text-align: left; color: #8ea47e;">You may also like</h3>
    </div>
    <section class="best-selling-gifts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="bestsellinggifts" class="owl-carousel">
                    @if(empty($related))
                        <p style="color:red;"> Sorry ! No Related Cake Found.</p>
	                @else
                    @foreach($related->take(6) as $relate)
                        <div class="item">
                            <a href="Product.html" style="color: black;" class="text-decoration-none">
                                <div class="shadow-effect">
                                    <img class="img-fluid" alt="100%x280" src="{{url('upload',$relate->image)}}"
                                        height="150px" width="300px">
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: black;">{{$relate->title}}</h4>
                                        <p class="card-text" style="color: black;">{{$relate->description}}</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection