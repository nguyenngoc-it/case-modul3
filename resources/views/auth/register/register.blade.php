<!doctype html>
<html lang="en">
<head>
    <title>Sign Up 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('register/css/style.css')}}">
</head>
<body class="img" style="background-image: url({{asset('register/images/bg.jpg')}});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Sign Up </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap">
                    <h3 class="text-center mb-4">Create Your Account</h3>
                    <form action="{{route('register.store')}}" class="signup-form" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="label" for="name">User Name</label>
                            <input name="username" type="text" class="form-control" placeholder="input username">
                            <span class="icon fa fa-user-o"></span>
                            @error('username')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email Address</label>
                            <input name="email" type="text" class="form-control" placeholder="johndoe@gmail.com">
                            <span class="icon fa fa-paper-plane-o"></span>
                        </div>
{{--                        <div class="form-group mb-3">--}}
{{--                            <label class="label" for="email">Name store</label>--}}
{{--                            <input name="namestore" type="text" class="form-control" placeholder="name store">--}}
{{--                            <span class="icon fa fa-paper-plane-o"></span>--}}
{{--                        </div>--}}
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span class="icon fa fa-lock"></span>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input  name="password_confirm" id="password-confirm" type="password" class="form-control" placeholder="Password">
                            <span id="message"></span>
                            <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span class="icon fa fa-lock"></span>
                            @error('password_confirm')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <select  name="role" id="password-confirm"  class="form-control">
                                <option value="2">Sell</option>
                                <option value="3">Buy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button name="signup" type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                        </div>
                    </form>
                    <p>I'm already a member! <a data-toggle="tab" href="#signin">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('register/js/jquery.min.js')}}"></script>
<script src="{{asset('register/js/my.js')}}"></script>
<script src="{{asset('register/js/popper.js')}}"></script>
<script src="{{asset('register/js/bootstrap.min.js')}}"></script>
<script src="{{asset('register/js/main.js')}}"></script>

</body>
</html>

