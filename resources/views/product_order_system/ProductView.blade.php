{{-- add a custom css file just for this page --}}
<?php  $styles=['css/order_system_css/orderStylesheet.css']; ?>
@extends('main.layout.mainlayout', compact('styles'))

@section('content')

@section('title', 'View produt')

<div class="ordersystem-cart">
        <a href="../show-cart" >
            <img src="../assets/image/product-cart.png" alt="" style="width: 45px; padding: 5px;right: 100px;">
                <span class="badge"><strong style="color: #66bb22;font-size: 16px;" > Cart:</strong><div class="badge badge-primary text-wrap ordersystem-cart-itemnumber" style="
                    font-size: 14px; width: 1rem;">{{Session::has('cart')? Session::get('cart')->totalQty:''}}</div> </span>
        </a>
</div>
</div>

        <div class="container d-flex product-view-style" style="margin-top: 100px; ">

            <div class="col-5">
                <div>
                    <!--Product image-->
                     <img  src="../product_images/{{$product['image']}}" class="product_image" alt="" style="width: 100%;
                     box-shadow: 0px 0px 0 5px #f0f0f0;">

                </div>

            </div>
            <!--Product details colum start-->
            <div class="col-5">
               <h1>{{$product['name']}}</h1>
                    <h3>Rs <strong>{{$product['selling_price']}}</strong></h3>
                    <p>{{$product['description']}}</p>
                    <p>by<strong>{{$product['brand']}}</strong></p>

                    <div class="input-group mb-3 quntity_input" >
                   <input  type="number" min="1" max="{{$product['quantity']}}"  class="form-control" placeholder="enter quntity.." aria-label="Recipient's username" aria-describedby="basic-addon2"style="
                   width: 85px;" >
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">available : {{$product['quantity']}}</span>
                            </div>
                    </div>

                    <div class="col-5 d-flex" style="padding-left: 0;">

                            <button type="button" class="btn btn-outline-danger" style=" margin-right: 10px; height: fit-content;" onclick="closeWin()">Cancel</button>
                            <a href="{{route('product.addToCart',['id'=>$product['product_id']]) }}" class="btn btn-primary  active" role="button" aria-pressed="true" style=" margin-right: 5px;">Add to Cart</a>



                    </div>



            </div>

        </div>
        @endsection