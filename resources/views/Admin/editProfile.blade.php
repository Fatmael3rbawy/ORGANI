<html>
<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
</head>
<body>
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{asset('images\users/' .$admin->image)}}" width="90"><span class="font-weight-bold"> {{$admin->name}}</span><span class="text-black-50">{{$admin->email}}</span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <a href="{{route('admin.index')}}">
                                <h6>Back to home</h6>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('admin.updateprofile',$admin->id)}}" enctype="multipart/form-data">
                        {{method_field('post')}}
                        @csrf
                        <h6>Name</h6>
                        <div class="row mt-2">
                            <div class="col-md-6"><input type="text" class="form-control" name="name" placeholder=" Name" value="{{$admin->name}}"></div>
                        </div>
                        <br>
                        <h6>Email</h6>

                        <div class="row mt-3">
                            <div class="col-md-6"><input type="text" class="form-control" name="email" placeholder="Email" value="{{$admin->email}}"></div>
                        </div>
                        <br>
                        <h6>Phone</h6>
                        <div class="row mt-3">
                            <div class="col-md-6"><input type="text" class="form-control" name="phone" value="{{$admin->phone}}" placeholder="Phone number"></div>
                        </div>
                        <br>
                        <h6> Upload New Image</h6>
                        <div class="row mt-3">
                            <div class="col-md-6"><input type="file" name="img" class="form-control"></div>
                        </div>
                        <div class="mt-5 text-right"> <button class="btn btn-primary profile-button"> Save Profile </button></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
<style>
    body {
        background: #BA68C8
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: #BA68C8;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

</style>
</html>
