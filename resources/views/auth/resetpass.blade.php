<!doctype html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="{{url('css/loginstyle.css')}}">
</head>
<body>
<?php $user = session('user');
?>
<div class="container white z-depth-2">
    <ul class="tabs teal">
        <li class="tab col s12"><a class="white-text active" href="#login">Reset Password</a></li>
    </ul>
    <div id="login" class="col s12">
        <form class="col s12" action = "/reset" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-container">
                <h3 class="teal-text"></h3>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name  = "password" type="password" class="validate">
                        <label for="password">Enter New Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name = "password" type="password" class="validate">
                        <label for="password">Retype Password</label>
                    </div>
                </div>
                <br>
                <center>
                    <button class="btn waves-effect waves-light teal" type="submit" name="action">Submit</button>
                    <br>
                    <br>
                    {{--<a href="">Forgotten password?</a>--}}
                </center>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>


