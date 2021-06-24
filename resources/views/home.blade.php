@extends('base')
@section('content')


<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($banners as $key => $slider)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img style="width: 100%; height: 450px;" width="10px"src="{{url('upload/'.$slider->image)}}" class="d-block w-100 img-fluid" alt="..."> 
                <div class="carousel-caption">
                        <h3 style="color:green">{{$slider->title}}</h2>
                        <p style="color: green;">{{$slider->description}}</p>
                        <a href="{{route('shop_cakes')}}" class="btn"
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

<div class="container-fluid mt-3" style="background:#f2f2f2">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <div class="col-lg">
            <a href="" class="text-decoration-none" data-toggle="modal" data-target="#cat_modal">
                <img src="{{asset('Images/Index/Nikon_Camera_cake_11_800x.jpg')}}" alt="Responsive image "class="img-fluid z-depth-1 rounded-circle mt-4 mb-3 me-5" style=" height:120px; width: 120px;cursor: pointer">
                <p class="text-dark text-justify text-center font-weight-bold">Personlized Cake</p>
            </a>

            <div class="modal fade" id="cat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Personilized Cake </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    @guest
                    <a href="{{route('new_login')}}" class="text-decoration-none"><h6 class="text-danger">Login First To Order</h6></a>
                    @endguest
                    <form action="{{route('customize')}}" method="POST" enctype="multipart/form-data" class="p-3">
                                @csrf
                                
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control"  name="description"rows="3"></textarea>
                                </div>
                                
                        
                                <div class="mb-4">
                                    <label for="">Weight Type</label>
                                    <select name="weight_type" id="weight_type" class="form-control">
                                        <option value="pound">Pound</option>
                                        <option value="kg">KG</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Weight</label>
                                    <input type="text" name="weight" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="">Shape</label>
                                    <input type="text" name="shape" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Flavour</label>
                                    <input type="text" name="flavour" class="form-control">
                                </div>
                                
                        
                                <div class="mb-3">
                                    <label class="form-label">Cake Images</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cake Thumbnails</label>
                                    <input type="file" name="images[]" class="form-control" multiple>
                                </div>
                                <div class="col-12 mt-2">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary w-100">    
                                   
                                </div>
                            </div>
                            </form>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

            </div>
                @foreach($categories as $c)
                     <div class="col">
                         <a href="{{route('category',$c->id)}}" class="text-decoration-none">
                              <img src="{{url('upload/'.$c->image)}}" alt="Responsive image "class="img-fluid z-depth-1 rounded-circle mt-4 mb-3 me-5" style=" height:120px; width: 120px;cursor: pointer">
                                <p class="text-dark text-justify text-center font-weight-bold">{{$c->cat_title }}</p>
                             </a>
                     </div>
                @endforeach   
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-12" style="">
                <div class="section-header text-center">
                    <p class="h2" style="color:green">Fresh Cake & Perfect for all Occasions</p>
                    <p class="text-success">3 Hour Delivery & Free Shipping in India. 71,382 cakes for your Beloved</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($categories as $c)
                        <div class="col-6 col-lg-3 view overlay zoom bg-transparent">
                            <a href="{{route('category',$c->id)}}" class="text-decoration-none">
                                <img src="{{url('upload/'.$c->image)}}" alt="Responsive image " class="img-fluid z-depth-1 rounded mb-3" style="height: 40vh; width: 40vw; cursor: pointer">
                                <p class="h6 text-muted text-center font-weight-bold text-justify" style="font-weight:25px">{{$c->cat_title }}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

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
                                    
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #8ea47e;">{{$c->title}}</h5>
                                        @if($c->discount_price)
                                        <h5 class=" h5 text-uppercase text-danger">₹{{ $c->discount_price }}  <del class="text-muted h6  ">₹ {{ $c->price }}</del></h5>
                                        @else
                                        <h5 class="mb-2 text-danger">₹{{ $c->price }}</5>
                                        @endif
                                        <p class="text-success">Get it {{$c->delivired}}</p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
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