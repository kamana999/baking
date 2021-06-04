@extends('base')
@section('content')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($banners as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img style="width: 100%; height: 400px;" width="10px" height="100px"src="{{url('upload/'.$slider->image)}}" class="d-block w-100" height="500px" alt="..."> 
            <div class="carousel-caption">
                    <h2 style="color:green">Personalised Gifts</h2>
                    <p style="color: green;">Inspired By Life Created By You</p>
                    <a href="Product.html" class="btn"
                        style="background-color: green; color: white; padding-left: 20px; padding-right: 20px">SHOP
                        NOW <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
<br>
<div class="container7">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn" style="border-radius: 10px;"><i class="fas fa-gifts fa-2x"></i>
                <br><a href="" style="color: white;" class="text-decoration-none">Find Perfect Gifts</a> </button>
            <div class="vl"></div>

            <button type="button" class="btn" style="border-radius: 10px;"><i class="fas fa-gifts fa-2x"></i><br> <a
                    href="" style="color: white;"class="text-decoration-none">Personalised
                    Gifts </a></button>
            <div class="vl"></div>
            <button type="button" class="btn" style="border-radius: 10px;"><i
                    class="fas fa-birthday-cake fa-2x"></i><br> <a href="" class="text-decoration-none"style="color: white;">
                    Cakes
                </a></button>
            <div class="vl"></div>
            <button type="button" class="btn" style="border-radius: 10px;"><i class="fas fa-seedling fa-2x"></i><br><a
                    href="" class="text-decoration-none" style="color: white;"> Plants
                </a></button>
            <div class="vl"></div>
            <button type="button" class="btn" style="border-radius: 10px;"><i class="fas fa-child fa-2x"></i><br> <a
                    href="" class="text-decoration-none" style="color: white;">Fathers Day Gift
                </a></button>
            <div class="vl"></div>
            <button type="button" class="btn" style="border-radius: 10px;"><i class="fas fa-truck fa-2x"></i><br> <a
                    href="" style="color: white;" class="text-decoration-none">Same Day
                    delivery</a></button>
        </div>
</div>
<br>
<br>


<div class="container1" id="browsegifts">
        <h1>Browse By Categories</h1>
        <div class="row">
            @foreach($categories as $c)
            
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mt-3">
                    <div class="card l-bg-cherry" style="height: 100px; border-radius: 20px;">
                        <div class="card-statistic-3 p-4">
                        
                            <div class="card-icon card-icon-large"><i class="fas fa-birthday-cake"></i></div>
                            <div class="mb-4 threeD">
                                <h5 class="card-title mb-0">{{$c->cat_title}}</h5>
                                <a class="card-link" href="{{route('category',$c->id)}}"></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            @endforeach
            
</div>  
    <br>

<section class="best-gift-under-300"> 
        <div class="container4">
            <h1>Best Cakes</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div id="bestgiftunder300" class="owl-carousel">
                    @foreach($cakes as $c)
                        <div class="item">
                            <a href="" style="color: black;"class="text-decoration-none">
                                <div class="shadow-effect-2" style="box-shadow: 1px 1px grey;">
                                    <img src="{{url('upload',$c->image)}}" height="225px" width="200px"
                                        alt="Card image cap">
                                    <div class="ribbon"><span class="ribbon__content"
                                            style="background-color: rgb(49, 1, 1); outline: 5px solid rgb(49, 1, 1);">Personalised</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #8ea47e;">{{$c->title}}</h5>
                                        <p class="card-text" style="color: #e8bbb5;">{{$c->price}}</p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
    <br>

    <section class="shop-by-personality">
        <div class="container3">
            <h1>Veg Cakes</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div id="shopbypersonality" class="owl-carousel">
                    @foreach($cakes as $c)
                    @if($c->isVeg == 'yes')
                        <div class="item">
                            <div class="shadow-effect">
                            
                                <img class="card-img-top" src="{{url('upload',$c->image)}}" height="125px" width="200px"
                                    alt="Card image cap">
                                    <div class="ribbon"><span class="ribbon__content"
                                            style="background-color: green; outline: 5px solid rgb(49, 1, 1);">Veg</span>
                                    </div>
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #8ea47e;">{{$c->title}}
                                    </h5>
                                    <p class="card-text">{{$c->description}}
                                    </p>
                                    <a href="Product.html" class="btn"
                                        style="background-color:#8ea47e;  color: white;">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!--Customer Ratings-->
<section class="customer-ratings">
        <div class="container5">
            <h1>Customer Stories and Reviews</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div id="customerratings" class="owl-carousel">
                        <div class="item">
                            <div class="shadow-effect-3">
                                <div class="course-preview1">
                                    <img src="Images/Index/customer-reviews.png" height="100px" width="100px">
                                </div>
                                <div class="card-body">
                                    <p style="color: palevioletred;">"Thank you so much really happy
                                        with your service withe work you guys are doing all the gifts I
                                        recievd are worthy it"</p>
                                    <p>Date: 12-02-2020<br>
                                        Location: Hyderabad<br>
                                        Occasion: General gifting
                                    </p>
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
                                    <p>Date: 12-02-2020<br>
                                        Location: Hyderabad<br>
                                        Occasion: General gifting
                                    </p>
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
                                    <p>Date: 12-02-2020<br>
                                        Location: Hyderabad<br>
                                        Occasion: General gifting
                                    </p>
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
                                    <p>Date: 12-02-2020<br>
                                        Location: Hyderabad<br>
                                        Occasion: General gifting
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<br>
<div class="container6">
        <div>
            <h1>Send Gifts Worldwide</h1>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <div class="col mb-4">
                <div class="card"
                    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('Images/Index/USA.jpg');">
                    <div class="card-description">
                        <h2>USA</h2>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card"
                    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('Images/Index/UK2.jfif');">
                    <div class="card-description">
                        <h2>UK</h2>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card"
                    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('Images/Index/Australia2.jfif');">
                    <div class="card-description">
                        <h2>AUSTRALIA</h2>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card"
                    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('Images/Index/Singapore.jfif');">
                    <div class="card-description">
                        <h2>SINGAPORE</h2>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card"
                    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('Images/Index/Other.jfif');">
                    <div class="card-description">
                        <h2>OTHERS</h2>
                    </div>
                </div>
            </div>
        </div>


</div>

@endsection


@include('footer')