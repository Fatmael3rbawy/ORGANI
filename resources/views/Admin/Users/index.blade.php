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
                    <h1>All Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <center>
                    <a href='{{route('users.create')}}'> <button class='alert alert-success' style="width:30% ;margin-top :10px"> Add New User</button> </a>
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
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>cat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $User)
                            <tr>
                                <td>{{$User->id}}</td>
                                <td> <img src="{{asset('images\users/' .$User->image)}}" style="width:25% ; height:15% ; margin-bottom: 5px; border-radius: 5px" /> </td>
                                <td>{{$User->name}}</td>
                                <td>{{$User->email}}</td>
                                <td>{{$User->phone}}</td>
                                @if($User->is_admin == 0)
                                <td> User</td>
                                @else
                                <td> Admin </td>
                                @endif
                                <td>
                                    <a href='{{route('users.edit',$User->id)}}'> <button class='alert alert-warning'> Edit </button><a>
                                            <a href='{{route('users.destroy',$User->id)}}'> <button class='alert alert-danger'> Delete </button> </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{$users->links()}}
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
