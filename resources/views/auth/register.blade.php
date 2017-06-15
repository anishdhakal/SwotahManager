<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="{{url('css/loginstyle.css')}}">
</head>
<body>
<div class="container white z-depth-2">
    <ul class="tabs teal">
        <li class="tab col s12"><a class="white-text" href="#register">register</a></li>
    </ul>
    <div id="register" class="col s12">
        <form class="col s12" method="post" action="/register">
            {{ csrf_field() }}
            <div class="form-container">
                <h3 class="teal-text">Welcome</h3>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <center>
                    <button class="btn waves-effect waves-light teal" type="submit">Submit</button>
                </center>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>


