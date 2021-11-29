@extends('Admin.layout.header')
@section('content')
<!-- Main content -->
<br><br>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">

                @if(session('message'))
                <div class='alert alert-success'>
                    <h6>
                        <center>{{session('message')}}</center>
                    </h6>
                </div>
                @endif

                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Products</th>
                                <th>Status</th>

                                <th>cat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>OR{{$order->id}}</td>
                                <td>
                                    @foreach ($order->products as $product )
                                    {{$product->product_name}} ,
                                    @endforeach

                                </td>
                                <td>
                                    @switch($order->status)
                                    @case('Pending')
                                    <span class="badge badge-warning" style='height:25px'>Pending</span>
                                    @break
                                    @case('Shipped')
                                    <span class="badge badge-success" style='height:25px'>Shipped</span>
                                    @break
                                    @case('Delivered')
                                    <span class="badge badge-danger" style='height:25px'>Delivered</span>
                                    @break
                                    @case('Processing')
                                    <span class="badge badge-info" style='height:25px'>Processing</span>

                                    @endswitch
                                </td>
                                <td>
                                    <a href='{{route('orders.edit',$order->id)}}'> <span class='alert alert-warning'> Edit </span><a>
                                            <a href='{{route('orders.destroy',$order->id)}}'> <span class='alert alert-danger'> Delete </span> </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    <center>
        {{$orders->links()}}
    </center>
</div>
@endsection
