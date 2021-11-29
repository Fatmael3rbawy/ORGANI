@include('layout.header')
<div class="section-title">
    <h2>{{$dept_name->department_name}} / All Products</h2>
</div>
  @if(session('message'))
        <div class='alert alert-success'>
            <h4>
                <center>{{session('message')}}</center>
            </h4>
        </div>
        @endif

<div class="row featured__filter">
    @foreach($dept_products as $product)

    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
        <div class="featured__item">
            <div class="featured__item__pic set-bg">
                <img src="{{asset('images\products/' . $product->image)}}">

                <ul class="featured__item__pic__hover">
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
            <div class="featured__item__text">
                <h6><a href="#">{{$product->product_name}}</a></h6>
                <h5>${{$product->price}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>

@extends('layout.footer')

{{-- <img  src="{{asset('images\products/' . $latestProduct->image)}}"> --}}
