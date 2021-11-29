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
                    <h1>All Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Products</li>
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
                <center>
                    <a href='{{route('products.create')}}'> <button class='alert alert-success' style="width:30% ;margin-top :10px"> Add New Product</button> </a>
                </center>
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
                                <th>ID</th>
                                <th>Image</th>
                                <th>Department</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>cat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $Product)
                            <tr>
                                <td>{{$Product->id}}</td>
                                <td> <img src="{{asset('images\products/' .$Product->image)}}" style="width:25% ; height:15% ; margin-bottom: 5px; border-radius: 5px" /> </td>
                               {{-- fun of 1-m retlation between products & departments --}}
                                <td>{{$Product->department->department_name}}</td>
                                <td>{{$Product->product_name}}</td>
                                <td>{{$Product->description}}</td>
                                <td>{{$Product->price}}$</td>
                                <td>{{$Product->discount}}%</td>

                                <td>
                                    <a href='{{route('products.edit',$Product->id)}}'> <button class='alert alert-warning'> Edit </button><a>
                                            <a href='{{route('products.destroy',$Product->id)}}'> <button class='alert alert-danger'> Delete </button> </a>
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
        {{$products->links()}}
    </center>
</div>
@endsection
