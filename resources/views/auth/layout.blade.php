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
       
        
        <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('shop_cakes')}}"><strong>Cakes</strong></a>
        </li>
        @guest
        <li class="nav-item me-auto">
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
 