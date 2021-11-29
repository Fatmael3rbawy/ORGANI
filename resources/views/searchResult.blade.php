@include('layout.header')
<div class="section-title">
    <h2>Search Results</h2>
</div>

    @if(session('result'))
    <div class='alert alert-danger'>
        <h4>{{session('result')}}</h4>
    </div>
    @endif
<div class="row featured__filter">

    @foreach($results as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
        <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{asset('img/featured/feature-1.jpg')}}">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
                <h6><a href="#">{{$product->product_name}}</a></h6>
                <h5>${{$product->price}}</h5>
            </div>
        </div>
    </div>
    @endforeach


    <div style="display: flex;justify-content: center;" >
        {{ $results->links() }} 
    </div>
</div>


@extends('layout.footer')
