
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="/style.css">--}}
    <title>Bootstrap 4 Login/Register Form</title>
    {{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
    {{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('css/css.css')}}">

</head>

<body>
<div id="logreg-forms">
    <form class="form-signin" method="post" action="{{route('home.login')}}">
        @csrf
        <h1 class
            ="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="">
        @error('email') <p class="text-danger">{{ $message }}</p>@enderror
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
        @error('password') <p class="text-danger">{{ $message }}</p>@enderror
        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        <a href="#" id="forgot_pswd">Forgot password?</a>
        <hr>
        </form>
    <div>
        <a class="btn btn-primary btn-block" href="{{route('register.index')}}"><i class="fas fa-user-plus"></i>sing up</a>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>
</html>
