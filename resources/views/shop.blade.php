@include('layout.header')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        @if(session('message'))
        <div class='alert alert-success'>
            <h4>
                <center>{{session('message')}}</center>
            </h4>
        </div>
        @endif
        <div class="col-lg-11 col-md-9">
            <div class="product__discount">

                <div class="section-title product__discount__title">
                    <h2>Sale Off</h2>
                </div>
                <div class="row">
                    <div class="product__discount__slider owl-carousel">

                        @foreach($sall_product as $product)
                        <div class="col-lg-4">
                            <div class="product__discount__item">
                                <div class="product__discount__item__pic set-bg" data-setbg="{{asset('images/products/' . $product->image)}}">
                                    {{-- <img src="{{asset('images\products/' . $product->image)}}"> --}}
                                    <div class="product__discount__percent">-{{$product->discount}}%</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        @auth
                                        <li>
                                            <form method='post' action="{{route('home.addtocard',['product_id'=>$product->id , 'user_id'=> Auth::user()->id])}}">
                                                @csrf
                                                <button type="hidden" type='submit' name='submit'>
                                                    <a href='#'><i class="fa fa-shopping-cart"></i></a></button>
                                            </form>
                                        </li>
                                        @endauth
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span>{{$product->product_name}}</span>
                                    {{-- <h5><a href="#">Raisin’n’nuts</a></h5> --}}
                                    <div class="product__item__price">${{$product->price-($product->price*$product->discount/100)}}<span>${{$product->price}}</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="filter__item">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="filter__sort">
                            <span>Sort By</span>
                            <select>
                                <option value="0">Default</option>
                                <option value="1">Ascending</option>
                                <option value="2">Descending</option>
                                <option value="3">ByPrice</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="filter__found">
                            <h6><span>{{$product_num}}</span> Products found</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="filter__option">
                            <span class="icon_grid-2x2"></span>
                            <span class="icon_ul"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('images/products/' . $product->image)}}">
                            {{-- <img src="{{asset('images\products/'.$product->image)}}"> --}}
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                @auth
                                <li>
                                    <form method='post' action="{{route('home.addtocard',['product_id'=>$product->id , 'user_id'=> Auth::user()->id])}}">
                                        @csrf
                                        <button type="hidden" type='submit' name='submit'>
                                            <a href='#'><i class="fa fa-shopping-cart"></i></a></button>
                                    </form>
                                </li>
                                @endauth
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$product->product_name}}</a></h6>
                            <h5>${{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{$products->links()}}

        </div>
    </div>
    </div>
</section>
<!-- Product Section End -->




@extends('layout.footer')
