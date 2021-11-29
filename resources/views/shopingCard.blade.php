@include('layout.header')

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                {{-- <th>Product Name</th> --}}
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset('images\products/'.$order->image)}}" style="width:100px;height:100px" alt="">
                                    <h5>{{$order->pname}}</h5>

                                </td>
                                {{-- <td class="shoping__cart__item">
                                    <h5>{{$order->pname}}</h5>
                                </td> --}}
                                <td class="shoping__cart__price">
                                    ${{$order->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div>
                                        <form action='{{route('decQuantity',$order->product_id)}}' method='post'>
                                            @csrf
                                            <span class="dec qtybtn"><input type="submit" value="-"></span>
                                        </form>
                                        {{-- <a href="{{route('IncQuantity',$order->product_id)}}"><span class="dec qtybtn"><input type="submit" value="-"></span> </a> --}}
                                        <input type="submit" name='qty' value="{{$order->quantity}}">
                                        <form action='{{route('IncQuantity',$order->product_id)}}' method='post'>
                                        @csrf
                                        <span class="inc qtybtn"><input type="submit" value="+"></span>
                                        </form>
                                        {{-- <a href="{{route('IncQuantity',$order->product_id)}}"><span> <input type="submit" value="+"></span> </a> --}}

                                    </div>
                </div>
                </td>
                <td class="shoping__cart__total">
                    ${{$order->total}}
                </td>
                <td class="shoping__cart__item__close">
                    <a href="{{route('deleteFromCard',$order->product_id)}}"> <span class="icon_close"></span></a>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__btns">
                <a href="{{route('Shop_products.index')}}"  class="primary-btn cart-btn cart-btn-right">CONTINUE SHOPPING</a>
                
                
            </div>
        </div>
        {{-- <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        <div class="col-lg-6">
            <div class="shoping__checkout">
                <h5>Cart Total</h5>
                <ul>
                    <li>Subtotal <span>${{$total}}</span></li>
                    <li>Total <span>${{$total}}</span></li>
                </ul>
                <a href="{{route('orders')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Shoping Cart Section End -->


@extends('layout.footer')
