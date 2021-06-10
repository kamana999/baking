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
<div class="container mt-4">
        <div class="row">
            <div class="col-lg-9">
                @if ($address)
                <div class="card" style="height: 200px;">
                    <div class="card-body">
                    <form action="{{route('orderDetail')}}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <select name="address" class="form-control">
                                    <option value="">Select default address</option>
                                    @foreach ($address as $a)
                                    <option value="{{$a->id}}">{{$a->name}} {{ $a->contact }} | {{$a->street}},{{$a->area->name }} ({{$a->district->name}}, {{$a->state->name}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="delivery" class="form-control">
                                    <option value="">Select Delivery Type</option>
                                    <option value="Standard Delivery">Standard Delivery (Free)</option>
                                    <option value="Economy Delivery">Economy Delivery charge (Rs.{{$delivery_charge->delivery_charge}}) </option>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-3 form-control" type="submit">Confirm Order</button>
                        </form>
                    </div>
                </div>
                @endif
                <div class="card" style="height: 380px;">
                    <div class="card-body text-dark" >
                        Create your Address Records
                        <form action="{{route('insert_address')}}" method="POST">
                            @csrf
                           <div class="row">
                            <div class="form-group col">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group col">
                                <label for="">Street</label>
                                <input type="text" name="street" class="form-control">
                            </div>
                           </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <label for="">Contact2</label>
                                    <input type="text" name="contact2" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                <label for="">Country<span class="text-danger"> * </span></label>
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($country as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">State<span class="text-danger"> * </span></label>
                                <select name="state_id" id="" class="form-control">
                                    @foreach ($state as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">District<span class="text-danger"> * </span></label>
                                <select name="district_id" id="" class="form-control">
                                    @foreach ($district as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">Area<span class="text-danger"> * </span></label>
                                <select name="area_id" id="" class="form-control">
                                    @foreach ($areas as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <input type="submit" value="Add Address" class="btn btn-success btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
                @foreach($orderitem as $oi)
                    <?php 
                        $total += $oi->cake->price * $oi->qty;
                        $discountTotal += $oi->cake->discount_price * $oi->qty;
                    ?>
                @endforeach
                <div class="totals">
                    <div class="totals-item">
                    <label><strong>Subtotal-</strong></label>
                            @if($oi->cake->discount_price)
                            <div class="totals-value" id="cart-subtotal">{{$discountTotal}}</div>
                            @else
                            <div class="totals-value" id="cart-subtotal">{{$total}}</div>
                            @endif
                    </div>
                    <div class="totals-item">
                    <label><strong>GST(18%) - </strong></label>
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
                                    <label class=""><strong>Coupon Value-</strong></label>
                                    <div class="totals-value" id="cart-shipping">{{$coupon->coupon->value}}%</div>
                                    <label><strong>Coupon Ammount-</strong></label>
                                    <div class="totals-value" id="cart-shipping">{{$coupons}}</div>
                                @else
                                    <div class="totals-value" id="cart-shipping">{{$coupon->coupon->value}}</div>
                                @endif
                                
                            </div>
                            
                            <div class="totals-item totals-item-total">
                                <label class="h5"><strong>Grand Total-</strong></label>
                                @if($oi->cake->discount_price)
                                <div class="totals-value text-danger" id="cart-total"><strong>{{$grandTotal = $tax + $discountTotal-$coupons}}</strong></div>
                                @else
                                <div class="totals-value text-danger" id="cart-total"><strong>{{$grandTotal = $tax + $total-$coupons}}</strong></div>
                                @endif
                            </div>
                        @endif

                    
                        @if(!$coupon->coupon_id)
                            <div class="totals-item totals-item-total">
                            <label class="h5"><strong>Grand Total-</strong></label>
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
                    <div class="mt-3 ml-5 p-2">
                  
                </div>
                
                    </div>
                </div>
        </div>
    </div>
</body>
<script>
 

</script>
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