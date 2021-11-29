@extends('Admin.layout.header')
@section('content')


<!DOCTYPE html>
<html lang="en">

<body>
    <br><br>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if(session('message'))
        <div class='alert alert-success'>
            <h6>
                <center>{{session('message')}}</center>
            </h6>
        </div>
        @endif
        <!--start section profile-->
        <section class="profile">
            <div class="overlay"></div>
            <div class="container">


                <div class="row justify-content-md-center">
                    <div class="col-sm-9">
                        <div class="profile-content">

                            <center>
                                <form action="{{route('orders.update',$order->id)}}" validate method="POST">
                                    @csrf

                                    <table class="table table-border table-striped" style="margin:25px;width:75%">

                                        <h1 class="username">Edit Order {{$order->id}} </h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h5> <select class="form-control" type="text" name="status" required style="width:500px "></h5>

                                                    <option> {{$order->status}}</option>
                                                    <option> Pending </option>
                                                    <option> Processing</option>
                                                    <option> Shipped</option>
                                                    <option> Delivered </option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </div>



                                        <tr>
                                            <td>
                                                <div class="submit">
                                                    <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="Update"></div>
                                            </td>
                                        </tr>


                                    </table>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
@endsection
