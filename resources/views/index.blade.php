<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
</head>
<body style="background-color:#ffffff">
<?php $user = session('user');
        $a = session('a');
        $attendance = session('attendance');
?>
@if($user->role=='admin')
    @include('layout.adminnav')
@else
    @include('layout.nav')
@endif
    <div class="container">
        <center><h1><strong style="font-family: 'Indie Flower', cursive;">WELCOME TO SWOTAH MANAGER</strong></h1>

            @if($a != 0)
                <form method="post" action="/punchout">
                    {{ csrf_field() }}
                    <br><br><br>
                    <input type="hidden" name="id" value = "{{$attendance->id}}">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="status" id="textarea1" class="materialize-textarea" placeholder="Insert comma separated values" required></textarea>
                                    <label for="textarea1">Status</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="font-family: 'Indie Flower', cursive;">
                        <strong style="font-size: 20px">Punch out</strong>
                    </button>
                </form>
            @else
                <form method="post" action="/punchin">
                    {{ csrf_field() }}
                    <br><br><br>

                    <input type="hidden" name="user_id" value = "{{$user->id}}" >
                    <input type="hidden" name="date" value = "{{\Carbon\Carbon::now()->toDateString()}}" >
                    <input type="hidden" name="time" value = "{{\Carbon\Carbon::now()->toTimeString()}}" >
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="font-family: 'Indie Flower', cursive;">
                        <strong style="font-size: 20px"> Punch in </strong>
                    </button>
                </form>
            @endif

        </center>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
    <script>
        $('#textarea1').trigger('autoresize');

    </script>
</body>
</html>