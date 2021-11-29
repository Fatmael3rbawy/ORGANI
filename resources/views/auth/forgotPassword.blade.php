@include('layout.error')
<!doctype html>
<html lang="en">
<head>
    <title>Ogani | Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet')}}">

    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

</head>
<body>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to login</h2>
                                <p>Don't have an account?</p>
                                <a href="{{route('auth.register')}}" class="btn btn-white btn-outline-white">Sign Up</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                           <div class="card-body">
                    @if (session('message'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                            <form action="{{route('auth.postMail')}}" class="signin-form" method="post">
                                @csrf
                                <br>
                                <br>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
                                </div>
                                <br>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
