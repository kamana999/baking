<!DOCTYPE html>

<head>
    <title>Gifts </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <script src="{{url('https://kit.fontawesome.com/a076d05399.js')}}"></script>
    <script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   </head> 
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#8ea47e">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}" id=""><img src="{{asset('Images/Index/Atrium logo (1)-01.png')}}" height="40px" width="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <form class="d-flex me-auto" action="/search" method="GET">
            @csrf
            <input class="form-control ms-5" name="searching" type="search" placeholder="Search Cakes Here" aria-label="Search" size="40">
            <button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></button>
        </form>
        @if(!$area)
        <a href=""class="btn btn-success btn-sm me-auto p-2" style="font-weight: 550" data-toggle="modal" data-target="#form"style="color: white;">
                <i class="fas fa-map-marker-alt"></i> Select Delievery Location 
        </a>
        @else
        <a href=""class="btn btn-success btn-sm me-auto p-2" style="font-weight: 550" data-toggle="modal" data-target="#form"style="color: white;">
                <i class="fas fa-map-marker-alt"></i>Delievery Location - {{$area->pincode}}
        </a>
        @endif
        <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('shop_cakes')}}"><strong>Cakes</strong></a>
        </li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{route('new_login')}}">Cart<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 ms-2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('new_login')}}">Login</a></li>
       
        @endguest
        @auth
        <li class="nav-item">
        
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::User()->name}}
            </a>
            <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item">
                <form action="{{route('logout')}}" method="POST">
                    <a href="" class="dropdown-item"><input type="submit" class="btn btn-sm" value="Logout" ></a>
                    @csrf
                </form>
                </a></li>
            </ul>
        </div>   
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cart')}}">Cart<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 ms-2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg></a>
        </li>
        @endauth
        
        <li class="nav-item">
            <a class="nav-link" href="{{route('aboutus')}}">Help<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill ms-2" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
            </svg></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- <header> -->
        <!--NAVIGATION-->
        <!-- <div class="topnav" id="myTopnav">
            <a href="{{route('home')}}" ><img src=""></a>
            <div class="Form" style="position: absolute;  padding-left: 200px; padding-top: 2px;">
                <form class="form-inline" id="#search">
                    <input class="form-control me-2" type="search" placeholder="Search Gifts" aria-label="Search"
                        style="padding-top: 20px; padding-bottom: 20px;">
                    <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"
                            style="color: #8ea47e"></i></button>
                </form>
        </div> -->
        <!-- <div class="topnav" id="myTopnav">
            <a href="{{route('home')}}" ><img src=""></a>
            <div class="Form" style="position: absolute;  padding-left: 200px; padding-top: 2px;">
                <form class="form-inline" id="#search">
                    <input class="form-control me-2" type="search" placeholder="Search Gifts" aria-label="Search"
                        style="padding-top: 20px; padding-bottom: 20px;">
                    <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"
                            style="color: #8ea47e"></i></button>
                </form>
        </div> -->

            <!-- <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 10px;">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Choose Your Delievery Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="myradio">
                                    <input type="radio" name="myRadio" id="one" class="myradio__input" checked>
                                    <label for="one" class="myradio__label">Within India</label>
                                </div>
                                <div class="myradio">
                                    <input type="radio" name="myRadio" id="two" class="myradio__input">
                                    <label for="two" class="myradio__label">Outside India</label>
                                </div>
                                <form action="{{route('home')}}" method="GET">
                                <div class="form-group" style="box-shadow: 2px solid palevioletred">
                                    <input type="text" class="form-control" id="password2" placeholder="Enter Pincode" name="search">
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <input type="submit" class="btn" style="background-color: #e8bbb5; color: white;">
                            </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        @auth   
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::User()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item">
                    <form action="{{route('logout')}}" method="POST">
                        <a href="" class="dropdown-item"><input type="submit" value="Logout" class="btn"></a>
                        @csrf
                    </form>
                    </a></li>
                </ul>
            </div> 
        @endauth
        @guest
            <a href="{{route('register')}}">Signup</a>
            <a href="{{route('login')}}">Login</a>
        @endguest
            <a href="aboutus.html" class="animate">About Us</a>
            <a href="contact.html" class="animate">Contact Us</a>
            <a href="index.html" class="animate">Home</a>
            <a href="" class="btn" data-toggle="modal" data-target="#form"
                style="background-color: #8ea47e; color: white; padding-top: 10px; padding-bottom: 10px;">
                <i class="fas fa-map-marker-alt"></i> Select Delievery Location
            </a>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

        </div> -->
    <!-- </header> -->

    <div id="navbar">
      
       <a href="{{route('home')}}" id="logo"><img src="{{asset('Images/Index/Atrium logo (1)-01.png')}}"></a>
        <div class="Form" style="position: absolute;  padding-left: 200px; padding-top: 2px;">
        <form class="d-flex me-auto">
        <input class="form-control ms-5" type="search" placeholder="Search" aria-label="Search" size="40">
        <button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>
      </form>
        </div>
           
        @auth   
        <div class="dropdown">
            <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::User()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item">
                <form action="{{route('logout')}}" method="POST">
                    <a href="" class="dropdown-item"><input type="submit" value="Logout" class="btn"></a>
                    @csrf
                </form>
                </a></li>
            </ul>
        </div>   
       
            <a class="nav-link" href="{{route('cart')}}">Cart<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 ms-2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg></a>
   
        @endauth
        <a class="nav-link" href="{{route('aboutus')}}">Help<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill ms-2" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
        </svg></a>
        @guest
        <a href="{{route('new_login')}}">Login</a>
    
            <a class="nav-link" href="{{route('new_login')}}">Cart<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4 ms-2" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg></a>
        
        @endguest
            <a class="nav-link" href="{{route('shop_cakes')}}"><strong>Cakes</strong></a>
            @if(!$area)
            <a href=""class="btn btn-success btn-sm me-auto p-2 text-light" style="" data-toggle="modal" data-target="#form"style="color: white;">
                    <i class="fas fa-map-marker-alt"></i> Select Delievery Location 
            </a>
            @else
            <a href=""class="btn btn-success btn-sm me-auto p-2 text-light" style="" data-toggle="modal" data-target="#form"style="color: white;">
                    <i class="fas fa-map-marker-alt"></i>Delievery Location - {{$area->pincode}}
            </a>
            @endif
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 10px;">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Choose Your Delievery Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="myradio">
                                    <input type="radio" name="myRadio" id="one" class="myradio__input" checked>
                                    <label for="one" class="myradio__label">Within India</label>
                                </div>
                                <div class="myradio">
                                    <input type="radio" name="myRadio" id="two" class="myradio__input">
                                    <label for="two" class="myradio__label">Outside India</label>
                                </div>
                                <form action="{{route('home')}}" method="GET">
                                
                                <div class="form-group" style="box-shadow: 2px solid palevioletred">
                                    <input type="text" class="form-control" id="password2" placeholder="Enter Pincode" name="search">
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <input type="submit" class="btn" style="background-color: #e8bbb5; color: white;">
                            </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light bootsnav p-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown1"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown1">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" data-toggle="modal" data-target="#cat_modal" class="nav-link"><strong>Personilized Cakes</strong></a>
            </li>
              @foreach ($categories as $c)
                @if($c->parent_id == null)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase ms-3 " href="#" style="font-size:small" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" >
                        {{$c->cat_title}}
                    </a>
                    @if ($c->children)
                      @foreach ($c->children as $child)
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle">{{$child->cat_title}}</a>
                            </li>
                        </ul>
                      @endforeach
                    @endif
                    </li>
                @endif
              @endforeach 
            </ul>
        </div>
    </nav>

    @yield('content')


    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h2>Company Name</h2>
                <p>Description of any product or motto of the company.</p>
            </div>

            <div class="footer-items">
                <h4>Information</h4>
                <div class="border1"></div>
                <ul>
                    <a href="aboutus.html">
                        <li>About us</li>
                    </a>
                    <a href="#">
                        <li>Work with us</li>
                    </a>
                    <a href="privacy.html">
                        <li>Privacy policy</li>
                    </a>
                    <a href="Conditions.html">
                        <li>Terms and conditions</li>
                    </a>
                </ul>
            </div>
            <div class="footer-items">
                <h4>Services</h4>
                <div class="border1"></div>
                <ul>
                    <a href="contact.html">
                        <li>Contact Us</li>
                    </a>
                    <a href="#">
                        <li>Shipping</li>
                    </a>
                    <a href="#">
                        <li>Returns</li>
                    </a>
                    <a href="faq.html">
                        <li>FAQ</li>
                    </a>
                </ul>
            </div>
            <div class="footer-items">
                <h4>Contact us</h4>
                <div class="border1"></div>
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>XYZ, abc</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>123456789</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>xyz@gmail.com</li>
                </ul>
                <div class="social-media">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-google-plus-square"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            Copyright &copy; Food and Burps 2020.
        </div>
    </div>
  </body>

  <script src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js')}}" type="text/javascript"></script>
    <link href="{{url('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css')}}" rel="Stylesheet" type="text/css" />

<script src="{{url('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}"integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"crossorigin="anonymous"></script>
<script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js')}}"></script>
<script src="{{asset('main.js')}}"></script>
<script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>
 
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.  min.js" integrity="sha384-   ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"        crossorigin="anonymous"></script>
    
    <title>Document</title>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light" style="background:#b7dadd">
  <div class="container">
  
    <a class="navbar-brand" href="{{route('home')}}">BakeIt</a>
    <form class="d-flex">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" size="50">
        <button class="btn btn-secondary br-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        </button>
    </form>
      <button type="button" class="btn btn-sm p-2 ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:#d2c4d5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
          </svg> Delivery Location
      </button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
      </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 100px;">
        <li class="nav-item"><a href="" class="nav-link">Cart</a></li>
            @auth   
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::User()->name}} 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Orders</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item">
                        <form action="{{route('logout')}}" method="POST">
                        <input type="submit" class="nav-link btn-danger btn text-white btn-sm" value="Logout">
                        @csrf
                    </form>
                    </a></li>
                </ul>
                </li>
               
            @endauth
            @guest
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Registor</a></li>
            @endguest
            
            <li class="nav-item"><a href="" class="nav-link">Help</a></li>
      </ul>
    </div>
  </div>
</nav>
Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Choose Your Delivery Location </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="{{route('home')}}" method="GET">
    
         <div class="mb-3">
              <input type="text" name="search" >
              <input type="submit">
          </div>
         </form>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
      </svg>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav">
      @foreach($categories as $cat)
        <li class="nav-item">
          <a class="nav-link active ms-5 p-0 text-dark" aria-current="page" href="#">{{$cat->cat_title}}</a>
          @endforeach
        </li>
      </ul>
      
    </div>
  </div>
</nav>



@yield('footer')

<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</script>

</body>
</html> -->