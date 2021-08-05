
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
        <!-- <p>Don't have an account!</p>  -->
        <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>
    </form>

    <form action="/reset/password/" class="form-reset">
        <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
    </form>

    <form action="" method="post" class="form-signup">
        @csrf
        <input type="text" id="user-name" class="form-control" name="name" placeholder="Full name" required="" autofocus="">
        <input type="email" id="user-email" class="form-control" name="email" placeholder="Email address" required autofocus="">
        <input type="password" id="user-pass" class="form-control"name="password" placeholder="Password" required autofocus="">
        {{--        <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required autofocus="">--}}

        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
        <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
    </form>
    <br>

</div>
<p style="text-align:center">
    <a href="http://bit.ly/2RjWFMfunction toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})g" target="_blank" style="color:black">By Artin</a>
</p>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>
</html>
