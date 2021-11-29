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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                                <form action="{{route('users.update',$user->id)}}" validate method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <table class="table table-border table-striped" style="margin:25px;width:75%">

                                        <h1 class="username">Edit User {{$user->id}} </h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>User Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="name" required value="{{$user->name}}" style="width:500px "></h5>
                                                    @error('name')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Email</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="email" required value="{{$user->email}}" style="width:500px "></h5>
                                                    @error('email')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </div>
                                        
                                          <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Phone</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="phone" required value="{{$user->phone}}" style="width:500px "></h5>
                                                    @error('email')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </div>
                                        
                                      
                                        
                                        <tr>
                                            <td> Upload Product Image </td>
                                            <td><input type="file" name="img" class="form-control-file border"  style="width:500px " /> </td>
                                        </tr>


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
