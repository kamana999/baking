@extends('base')
@section('content')



<style>
    .product-section{
        display:grid;
        grid-template-columns: 1fr 1fr;
        grid-gap:20px;
        margin-top:20px;
    }
    .product-section-images{
        display:grid;
        grid-template-columns: repeat(6,1fr);
        grid-gap:10px;
        margin-top:20px;
    }
    .product-section-thumbnail{
        display:flex; 
        align-items:center;
        height:80px; 
        width:80px;
        padding:5px;
        ;
        border:1px solid lightgray; 
        cursor:pointer;
    }
    .col>img{
        
        height:80px; 
        width:80px;
        padding:5px;
        border:1px solid gray; 
        cursor:pointer;
    }
    .selected{
            border:2px solid green;
            
    }
    .product-section-thumbnail:hover{
        border:2px solid green; 
    }
    .demo{
        
        width: 400px;
        height: 400px;
        overflow:hidden;
    }
    .demo > img {  
    object-fit: cover;
        width: 100%;
        height: 100%;
    transition: all .4s ease-in-out;
    }
    .demo:hover{
        transform: scale(1.03);
    }
</style>

<div class="container p-5">
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0 p-0 "fixed>
            <div class="demo">
                <a href="" >
                    <img src="{{url('upload',$cakes->image)}}" style="height:400px; width:400px;" id="currentImage">
                </a>
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="{{url('upload',$cakes->image)}}"style="height:75px; width:75px;"> 
                </div>
                <?php foreach (json_decode($cakes->images)as $picture) { ?>
                    <div class="product-section-thumbnail">
                        <img src="{{ asset('/upload/'.$picture) }}" style="height:75px; width:75px;">
                    </div>
                <?php } ?>
                
            </div>
            
        </div>
        <div class="col-md-6 m-0 p-0">

            <h5 style="font-size: 25px;" class="text-muted">{{ $cakes->title }} {{$cakes->weight}} ({{$cakes->weight_type}})</h5>
            @if($cakes->discount_price)
            <h5 class=" h4 text-uppercase text-danger">₹{{ $cakes->discount_price }}  <del class="text-muted h6  ">₹ {{ $cakes->price }}</del></h5>
            @else
            <h5 class="mb-2 text-danger">₹{{ $cakes->price }}</5>
            @endif
            <h5 class="h6mb-2">{{ $cakes->flavour }}</5>
            

            <h6 class="text-muted mt-3">Pick an Upgrade</h6>
            <div class="container">
                <div class="row">
                <div class="col ">
                    <a href="{{route('cakes',$cakes->id)}}" >
                    <img src="{{url('upload',$cakes->image)}}"style="height:75px; width:75px;"class="selected" > 
                    </a>
                    <h6>{{$cakes->weight}}{{$cakes->weight_type}}</h6>
                    @if($cakes->discount_price)
                        <h5 class="text-danger h6">₹{{$cakes->discount_price}}</h5>
                    @else
                    <h5 class="text-danger h6">₹{{$cakes->price}}</h5>
                    @endif 
                </div>
                @foreach($upgrade as $u)
                <div class="col m-0">
                    <a href="{{route('cakes',$u->id)}}">
                    <img src="{{ asset('/upload/'.$u->image) }}" alt="" style="height:75px; width:75px;">   
                    </a>
                
                    <h6>{{$u->weight}}{{$u->weight_type}}</h6>
                    @if($u->discount_price)
                        <h5 class="text-danger h6">₹{{$u->discount_price}}</h5>
                    @else
                    <h5 class="text-danger h6">₹{{$u->price}}</h5>
                    @endif
                </div>
                @endforeach
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                        <form action="{{route('area',$cakes->id)}}" method="GET">
                            @csrf
                            @if(!$area)
                            <input type="text" value="" class="form-control p-4" name="area" placeholder="Enter Pincode" style="border: 1px solid #ff9212;" required>
                            <p class="text-danger">Please Select Pincode First</p>
                            <input type="submit"hidden>
                            @endif
                            
                        </form>
                        </div>
                        <form action="{{route('add_to_cart',['id'=>$cakes->id])}}" method="POST">
                        @csrf
                            @if($area)
                            <input type="text" value="{{$area->pincode}}" class="form-control p-4" name="area" placeholder="Enter Pincode" style="border: 1px solid #ff9212;"required>
                            @endif
                            <div class="myradio">
                                <input type="radio" name="isVeg" value="with Egg" id="one1" class="myradio__input" checked>
                                <label for="one1" class="myradio__label">With Egg</label>
                            </div>
                            <div class="myradio">
                                <input type="radio" name="isVeg" value="Eggless" id="two2" class="myradio__input">
                                <label for="two2" class="myradio__label">Eggless</label>
                            </div>
                            @auth
                            <button type="submit" class="btn form-control mt-4 text-white btn-lg" style="background:#8ea47e"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>  Add to cart</a>
                            @endauth  
                            @guest
                                <a href="{{route('new_login')}}" class="text-decoration-none text-light"><button type="button" class="btn form-control mt-4 text-white btn-lg" style="background:#8ea47e"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>  Add to cart</a>
                            
                            @endguest  
                    </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input  type="text" name="delivery_date"id="txtDate"minDate="0" placeholder="Select Delivery Date" onfocus="(this.type='date')" onblur="(this.type='text')" class="datepicker form-control p-4 " autocomplete="off" style="border: 1px solid green;" required>
                            </div>
                            @if($area)     
                                <div class="mb-3">
                                <select required="required" class="form-control mt-3" name="delivery_time" >
                                        <option value ="">Choose Delivery Time</option>
                                        <?php
                                        foreach (json_decode($area->delivery_time)as $item) { ?>
                                            "<option value='{{$item}}'>{{$item}}</option>"
                                        <?php } 
                                        ?>
                                    </select>
                                </div>
                            @endif
                            <div class="mb-3">
                                <input type="text" name="message" placeholder="message on cake            25" class="form-control p-4" style="border: 1px solid green;" maxlength = "25">
                            </div>
                            <p class="text-success">Get it {{$cakes->delivired}}</p>
                        <!-- <a href="" type="button" class="btn btn-lg form-control mt-2 text-white" style="background:#a88f8c"> Buy Now</a> -->
                        </div>
                    </form>
                </div>
            </div>
            <h5 class=" h6 mt-5">Description</h5>
            <hr>
            <div class="table-responsive">
              <table class="table table-sm table-borderless mb-0">
                <tbody>
                  <tr>
                    <th class="text-capitalize"style="font-size: 15px;font-weight: bolder" scope="row"><strong>Shape</strong></th>
                    <td class="text-capitalize">{{$cakes->shape}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>serve</strong></th>
                    <td class="text-capitalize h6">{{$cakes->serve}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Weight</strong></th>
                    <td class="text-capitalize">{{$cakes->weight}}{{$cakes->weight_type}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Flavour</strong></th>
                    <td class="text-capitalize">{{$cakes->flavour}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Type</strong></th>
                    <td class="text-capitalize">{{$cakes->category->cat_title}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery</strong></th>
                    <td class="text-capitalize">India</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>

<script>
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        
        $('#txtDate').attr('min', maxDate);
    </script>
<script type="text/javascript">

    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-section-thumbnail');

        images.forEach((element) => element.addEventListener('click',thumbnailClick));

        function thumbnailClick(e){
            currentImage.src = this.querySelector('img').src;

            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
        

    })();
    
</script>



<!-- <div class="container-fluid">
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
</div> -->

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
                                    <img src="{{asset('Images/Index/customer-reviews.png')}}" height="100px" width="100px">
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
                            <a href="{{route('cakes',$relate->id)}}" style="color: black;" class="text-decoration-none">
                                <div class="shadow-effect">
                                    <img class="img-fluid" alt="100%x280" src="{{url('upload',$relate->image)}}"
                                        height="150px" width="300px">
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: black;">{{$relate->title}}</h4>
                                        @if($relate->discount_price)
                                        <h5 class=" h5 text-uppercase text-danger">₹{{ $relate->discount_price }}  <del class="text-muted h6  ">₹ {{ $relate->price }}</del></h5>
                                        @else
                                        <h5 class="mb-2 text-danger">₹{{ $relate->price }}</5>
                                        @endif
                                        <p class="text-success">Get it {{$relate->delivired}}</p>
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