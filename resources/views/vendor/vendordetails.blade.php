<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script     src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.  min.js" integrity="sha384-   ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"        crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    
<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background:#b7dadd">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">BakeIt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 100px;">
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
                        <input type="submit" class="nav-link btn  btn-sm" value="Logout">
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
      </ul>
    </div>
  </div>
</nav>

<div class="col-lg-6 mx-auto mt-5">
            <div class="card card-body">
            <h3>Detail Information of Vendor</h3>
            <form action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Contact<span class="text-danger"> * </span></label>
                    <input type="text" name="contact" class="form-control">
                    @if ($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                    @endif

                </div> 
                <div class="mb-3">
                    <label for="">contact2</label>
                    <input type="text" name="contact2" class="form-control">
                </div> 
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Street<span class="text-danger"> * </span></label>
                    <input type="text" name="street" class="form-control">
                    @if ($errors->has('street'))
                        <span class="text-danger">{{ $errors->first('street') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Country<span class="text-danger"> * </span></label>
                    <select name="country_id" id="" class="form-control">
                        @foreach ($country as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">State<span class="text-danger"> * </span></label>
                    <select name="state_id" id="" class="form-control">
                        @foreach ($state as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="">District<span class="text-danger"> * </span></label>
                    <select name="district_id" id="" class="form-control">
                        @foreach ($district as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="">area<span class="text-danger"> * </span></label>
                    <select name="area_id" id="" class="form-control">
                        @foreach ($area as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="">image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-dark w-100">
                </div>
            </form>
            <script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</script>

</body>
</html>