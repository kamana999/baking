@extends('base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
        <h3 class=" text-center mt-5"><strong>Order Details</strong></h3>
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
           <div class="table-responsive text-center">
              <table class="table  table-borderless mb-0">
                <tbody>
                  <tr>
                    <th class="text-capitalize"style="font-size: 15px;font-weight: bolder" scope="row"><strong>Order ID</strong></th>
                    <td class="text-capitalize">{{$order->id}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Type</strong></th>
                    <td class="text-capitalize h6">{{$order->delivery_type}}</td>
                  </tr>
                  
                  <tr>
                    <th>Subtotal</th>
                    <td>@if($oi->cake->discount_price)
                            <div class="totals-value" id="cart-subtotal">{{$discountTotal}}</div>
                            @else
                            <div class="totals-value" id="cart-subtotal">{{$total}}</div>
                            @endif</td>
                  </tr>
                  <tr>
                    <th>GST (18)%</th>
                    <td>@if($oi->cake->discount_price)
                            <div class="totals-value" id="cart-tax">{{$tax = $discountTotal*18/100}}</div>
                            @else
                            <div class="totals-value" id="cart-tax">{{$tax = $total*18/100}}</div>
                            @endif</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Charge</strong></th>
                    <td class="text-capitalize">Rs. {{$order->delivery_charge}}</td>
                  </tr> 
                  @if($order->coupon_id) 
                        @if($order->coupon->type == 'percentage')
                        <?php 
                            if($oi->cake->discount_price)
                            $coupons = $discountTotal*$order->coupon->value/100;
                            else
                            $coupons = $total*$order->coupon->value/100;
                        ?>
                        @else
                        <?php $coupon = $order->coupon->value;?>
                        @endif

                  <tr>
                    <th>Coupon</th>
                    <td>
                    @if($order->coupon->type == 'percentage')
                        <tr>
                            <th><strong>Coupon Value-</strong></th>
                            <td class="totals-value" id="cart-shipping">{{$order->coupon->value}}%</td></tr>
                        <tr>
                            <th><strong>Coupon Ammount-</strong></th>
                            <td class="totals-value" id="cart-shipping">{{$coupons}}</td>
                        </tr>
                    @else
                        <tr>
                            <th><strong>Coupon Value-</strong></th>
                            <td class="totals-value" id="cart-shipping">{{$order->coupon->value}}</td>
                        </tr>
                    @endif
                    </td>
                 </tr> 
                  <tr>
                    <th>Grand Total</th>
                    <td>
                    @if($oi->cake->discount_price)
                    <div class="totals-value text-danger" id="cart-total"><strong>{{$grandTotal = $tax + $discountTotal-$coupons+$order->delivery_charge}}</strong></div>
                    @else
                    <div class="totals-value text-danger" id="cart-total"><strong>{{$grandTotal = $tax + $total-$coupons + $order->delivery_charge}}</strong></div>
                    @endif
                    </td>
                  </tr>
                  @endif
                  @if(!$order->coupon_id)

                        <tr>
                            <th>Grand Total</th>
                            <td>
                            @if($oi->cake->discount_price)
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $discountTotal+$order->delivery_charge}}</div>
                                @else
                                <div class="totals-value" id="cart-total">{{$grandTotal = $tax + $total+$order->delivery_charge}}</div>
                                @endif
                            </td>
                        </tr>
                  @endif
                 
                  </tbody>
                 
              </table>
              <a href="{{route('confirm')}}">
              <button type = "submit" class="btn btn-success mb-4">Place Order</button>
              </a>
            </div>
                
           
              <!-- <div class="col-lg-3">
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
                    @if($order->coupon_id)

                            @if($order->coupon->type == 'percentage')
                            <?php 
                                if($oi->cake->discount_price)
                                $coupons = $discountTotal*$order->coupon->value/100;
                                else
                                $coupons = $total*$order->coupon->value/100;
                            ?>
                            @else
                            <?php $coupon = $order->coupon->value;?>
                            @endif
                            <div class="totals-item">
                                
                                @if($order->coupon->type == 'percentage')
                                    <label class=""><strong>Coupon Value-</strong></label>
                                    <div class="totals-value" id="cart-shipping">{{$order->coupon->value}}%</div>
                                    <label><strong>Coupon Ammount-</strong></label>
                                    <div class="totals-value" id="cart-shipping">{{$coupons}}</div>
                                @else
                                    <div class="totals-value" id="cart-shipping">{{$order->coupon->value}}</div>
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

                    
                        @if(!$order->coupon_id)
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
            </div> -->
        </div>
    </div>
</div>

@endsection