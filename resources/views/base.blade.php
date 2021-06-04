<!DOCTYPE html>

<head>
    <title>Gifts </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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

    <div class="banner">
        <a href="">
            <h2>Browse Gifts</h2>
        </a>
        <span>
            <a href="#"><i class="fas fa-dollar-sign" style="padding-right: 25px; color: white;"></i></a>
            <a href="#"><i class="fas fa-map-marker-alt" style="padding-right: 25px; color: white;"></i></a>
            <a href="cart2.html"><i class="fas fa-shopping-bag" style="padding-right: 25px; color: white;"></i></a>
        </span>
    </div>
    <header>
        <!--NAVIGATION-->
        <div class="topnav" id="myTopnav">
            <a href="{{route('home')}}" id="logo"><img src="{{asset('Images/Index/Atrium logo (1)-01.png')}}"></a>
            <div class="Form" style="position: absolute;  padding-left: 200px; padding-top: 2px;">
                <form class="form-inline" id="#search">
                    <input class="form-control me-2" type="search" placeholder="Search Gifts" aria-label="Search"
                        style="padding-top: 20px; padding-bottom: 20px;">
                    <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"
                            style="color: #8ea47e"></i></button>
                </form>
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

        </div>
    </header>

    <div id="navbar">
        <a href="home.html" id="logo"><img src="{{asset('Images/Index/Atrium logo (1)-01.png')}}"></a>
        <div class="Form" style="position: absolute;  padding-left: 200px; padding-top: 2px;">
            <form class="form-inline" id="#search">
                <input class="form-control me-2" type="search" placeholder="Search Gifts" aria-label="Search"
                    style="padding-top: 20px; padding-bottom: 20px;">
                <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"
                        style="color: #8ea47e"></i></button>
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
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light bootsnav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              @foreach ($categories as $c)
                @if($c->parent_id == null)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="padding-left: 60px; padding-right: 20px;">
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