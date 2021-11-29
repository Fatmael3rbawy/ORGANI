{{-- @include('layout.error') --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ogani | RegistrationForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('fonts/linearicons/style.css')}}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="images/image-1.png" alt="" class="image-1">
            <form method="post" action="{{route('auth.handelregister')}}">
                @csrf
                <h3>New Account?</h3>

                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text"  class="form-control  @error('name') is-invalid @enderror" placeholder="Username"  name="name" value="{{old('name')}}" required>
                    @error('name')
                    <div class="alert alert-danger" style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{old('phone')}}" required>
                    @error('phone')
                    <div class="alert alert-danger" style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{old('email')}}"  required>
                    @error('email')
                    <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}" required>
                    @error('password')
                    <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                    @error('password_confirmation')
                    <div >{{ $message }}</div>
                    @enderror
                </div>
                <button name="register">
                    <span>Register</span>
                </button>
            </form>
            <img src="images/image-2.png" alt="" class="image-2">
        </div>

    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
