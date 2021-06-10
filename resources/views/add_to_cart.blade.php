@extends('base')
@section('content')


<!DOCTYPE html>

<head>
    <title>Cart </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="style.css">
    <style>
        @import "compass/css3";

        .product-image {
            float: left;
            width: 20%;
        }

        .product-details {
            float: left;
            width: 37%;
        }

        .product-price {
            float: left;
            width: 12%;
        }

        .product-quantity {
            float: left;
            width: 10%;
        }

        .product-removal {
            float: left;
            width: 9%;
        }

        .product-line-price {
            float: left;
            width: 12%;
            text-align: right;
        }

        /* This is used as the traditional .clearfix class */
        .group:before,
        .shopping-cart:before,
        .column-labels:before,
        .product:before,
        .totals-item:before,
        .group:after,
        .shopping-cart:after,
        .column-labels:after,
        .product:after,
        .totals-item:after {
            content: '';
            display: table;
        }

        .group:after,
        .shopping-cart:after,
        .column-labels:after,
        .product:after,
        .totals-item:after {
            clear: both;
        }

        .group,
        .shopping-cart,
        .column-labels,
        .product,
        .totals-item {
            zoom: 1;
        }

        /* Apply clearfix in a few places */
        /* Apply dollar signs */
        .product .product-price:before,
        .product .product-line-price:before,
        .totals-value:before {
            content: '$';
        }

        /* Body/Header stuff */
        /* body {
            padding: 0px 30px 30px 20px;
            font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 100;
        } */

        h1 {
            font-weight: 100;
        }

        label {
            color: #aaa;
        }

        .shopping-cart {
            margin-top: -45px;
        }

        /* Column headers */
        .column-labels label {
            padding-bottom: 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .column-labels .product-image,
        .column-labels .product-details,
        .column-labels .product-removal {
            text-indent: -9999px;
        }

        /* Product entries */
        .product {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .product .product-image {
            text-align: center;
        }

        .product .product-image img {
            width: 100px;
        }

        .product .product-details .product-title {
            margin-right: 20px;
            font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
        }

        .product .product-details .product-description {
            margin: 5px 20px 5px 0;
            line-height: 1.4em;
        }

        .product .product-quantity input {
            width: 40px;
        }

        .product .remove-product {
            border: 0;
            padding: 4px 8px;
            background-color: #c66;
            color: #fff;
            font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
            font-size: 12px;
            border-radius: 3px;
        }

        .product .remove-product:hover {
            background-color: #a44;
        }

        /* Totals section */
        .totals .totals-item {
            float: right;
            clear: both;
            width: 100%;
            margin-bottom: 10px;
        }

        .totals .totals-item label {
            float: left;
            clear: both;
            width: 79%;
            text-align: right;
        }

        .totals .totals-item .totals-value {
            float: right;
            width: 21%;
            text-align: right;
        }

        .totals .totals-item-total {
            font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
        }

        .checkout {
            float: right;
            border: 0;
            margin-top: 20px;
            padding: 6px 25px;
            background-color: #6b6;
            color: #fff;
            font-size: 25px;
            border-radius: 3px;
        }

        .checkout:hover {
            background-color: #494;
        }

        /* Make adjustments for tablet */
        @media screen and (max-width: 650px) {
            .shopping-cart {
                margin: 0;
                padding-top: 20px;
                border-top: 1px solid #eee;
            }

            .column-labels {
                display: none;
            }

            .product-image {
                float: right;
                width: auto;
            }

            .product-image img {
                margin: 0 0 10px 10px;
            }

            .product-details {
                float: none;
                margin-bottom: 10px;
                width: auto;
            }

            .product-price {
                clear: both;
                width: 70px;
            }

            .product-quantity {
                width: 100px;
            }

            .product-quantity input {
                margin-left: 20px;
            }

            .product-quantity:before {
                content: 'x';
            }

            .product-removal {
                width: auto;
            }

            .product-line-price {
                float: right;
                width: 70px;
            }
        }

        /* Make more adjustments for phone */
        @media screen and (max-width: 350px) {
            .product-removal {
                float: right;
            }

            .product-line-price {
                float: right;
                clear: left;
                width: auto;
                margin-top: 10px;
            }

            .product .product-line-price:before {
                content: 'Item Total: $';
            }

            .totals .totals-item label {
                width: 60%;
            }

            .totals .totals-item .totals-value {
                width: 40%;
            }
        }
    </style>
</head>
<body><br>


    <div class="container">
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
        <h1>Shopping Cart</h1>
        <br><br>
        <div class="shopping-cart">
            @if (count($orderitem)>0)
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
            @endif
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>
                @foreach($orderitem as $oi)
                    <?php 
                        $total += $oi->cake->price * $oi->qty;
                        $discountTotal += $oi->cake->discount_price * $oi->qty;
                    ?>
                    <div class="product">
                        <div class="product-image">
                            <img src="{{ asset('upload/'.$oi->cake->image)}}">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{$oi->cake->title}}</div>
                            <p class="product-description">{{$oi->cake->description}}</p>
                        </div>
                        <div class="product-price">
                        @if($oi->cake->discount_price)
                            <span class="d-block m-0 text-danger h5">₹{{$oi->cake->discount_price}}</span>
                            <span class="d-block m-0 text-muted small"><del>₹{{$oi->cake->price}}</del></span>
                        @else
                            <span class="d-block m-0 text-danger h5">₹{{$oi->cake->price}}</span>
                        @endif
                        </div>
                        <div class="product-quantity">
                            <a href="{{route('removecart',['id'=>$oi->cake->id])}}" class="text-decoration-none text-danger " style="font-size:30px">-</a>
                            <span>{{$oi->qty}}</span>
                            <a href="{{route('add_to_cart_details',['id'=>$oi->cake->id])}}" class="text-decoration-none text-success" style="font-size:20px">+</a>
                            </td>
                        </div>
                        <div class="product-removal">
                            <a href="{{route('removeitem',['id'=>$oi->cake->id])}}"><button class="remove-product">Remove </button></a>
                        </div>
                        <div class="product-line-price"> 
                            @if($oi->cake->discount_price)
                                <span class="d-block m-0 text-danger h5">{{$discountTotal = $oi->qty*$oi->cake->discount_price}}</span>
                                <span class="d-block m-0 text-muted small"><del>{{$total = $oi->qty*$oi->cake->price}}</del></span>
                            @else
                            <span class="d-block m-0 text-danger h5">{{$total = $oi->qty*$oi->cake->price}}</span>
                            @endif
                        </div>
                    </div>
                

                <div class="totals">
                        <div class="totals-item">
                            <label>Subtotal</label>
                            @if($oi->cake->discount_price)
                            <div class="totals-value" id="cart-subtotal">{{$discountTotal}}</div>
                            @else
                            <div class="totals-value" id="cart-subtotal">{{$total}}</div>
                            @endif
                        </div>
                        <div class="totals-item">
                            <label>GST(18%)</label>
                            @if($oi->cake->discount_price)
                            <div class="totals-value" id="cart-tax">{{$tax = $discountTotal*18/100}}</div>
                            @else
                            <div class="totals-value" id="cart-tax">{{$tax = $total*18/100}}</div>
                            @endif
                        </div>
                        @if($coupon->coupon_id)

                            @if($coupon->coupon->type == 'percentage')
                            <?php 
                                if($oi->cake->discount_price)
                                $coupons = $discountTotal*$coupon->coupon->value/100;
                                else
                                $coupons = $total*$coupon->coupon->value/100;
                            ?>
                            @else
                            <?php $coupon = $coupon->coupon->value;?>
                            @endif
                            <div class="totals-item">
                                
                                @if($coupon->coupon->type == 'percentage')
                                    <label>Coupon Value</label>
                                    <div class="totals-value" id="cart-shipping">{{$coupon->coupon->value}}%</div>
                                    <label>Coupon Ammount</label>
                                    <div class="totals-value" id="cart-shipping">{{$coupons}}</div>
                                @else
                                    <div class="totals-value" id="cart-shipping">{{$coupon->coupon->value}}</div>
                                @endif
                                <a href="{{route('coupon.destroy')}}" class="text-danger mb-5">Remove Coupon</a>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                @if($oi->cake->discount_price)
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $discountTotal-$coupons}}</div>
                                @else
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $total-$coupons}}</div>
                                @endif
                            </div>
                        @endif
                        @if(!$coupon->coupon_id)
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                @if($oi->cake->discount_price)
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $discountTotal}}</div>
                                @else
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $total}}</div>
                                @endif
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Coupon Code</label>
                                <div class="">
                                <form action="{{route('cart.coupon')}}" method="post" class="d-flex">
                                    @csrf
                                    <input type="text" name="coupon_code" required>
                                    <input type="submit" value="Apply"class="btn btn-sm btn-dark">
                                </form>
                                </div>   
                            </div>
                        @endif
                        </div>
                    <a href="{{route('checkout')}}"><button class="checkout">Checkout</button></a>
                </div>
                @endforeach
                </div>
                
                



                
    </div>

    <br>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="jquery.min.js"></script>
<script src="main.js"></script>

</html>
@endsection