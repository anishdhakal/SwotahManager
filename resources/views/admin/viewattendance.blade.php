<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
</head>
<body style="background-color:#ffffff">
@include('layout.adminnav')
<center><h1><strong style="font-family: 'Indie Flower', cursive;">WELCOME TO SWOTAH MANAGER</strong></h1>
    <?php $user = session('user');
    ?>
    <div class="container">
        <form method="post" action="/viewattendance">
            {{csrf_field()}}
            <br><br><br>
            <label style="float: left">Select Date</label>
            <input type="date" name  = "date" class="datepicker" placeholder="MM/DD/YYYY">

            <div class="input-field col s12">
                <select name = "email">
                    <option value = ''>Please select a user</option>
                    @foreach($users as $user )
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>
                <label>Select Name</label>
            </div>
            <button class="waves-effect waves-light btn" style="font-family: 'Indie Flower', cursive;">
                <strong style="font-size: 20px">View Attendance</strong>
            </button>
        </form>
    </div>
</center>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"></script>
<script>
    //date picker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    //select name
    $(document).ready(function() {
        $('select').material_select();
    });

</script>
</body>
</html>