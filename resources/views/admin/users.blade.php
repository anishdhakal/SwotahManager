<!doctype html>
<html lang="en">
<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link rel="stylesheet" href="{{url('css/loginstyle.css')}}">
</head>
<body style="background-color:#ffffff">
@include('layout.adminnav')
<center><h1><strong style="font-family: 'Indie Flower', cursive;">WELCOME TO SWOTAH MANAGER</strong></h1>
<!--    --><?php //$user = session('user');
//    ?>
    <div class="container">
        <a class="waves-effect waves-light btn" href="#modal1">Add User</a>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <div id="register" class="col s12">
                    <form class="col s12" method="post" action="/register">
                        {{ csrf_field() }}
                        <div class="form-container">
                            <h3 class="teal-text">Add New User</h3>
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
                            <div class="input-field col s12">
                                <select name="role">
                                    {{--<option value="" disabled selected>Choose your option</option>--}}
                                    <option value = "user">User</option>
                                    <option value = "admin">Admin</option>
                                </select>
                                <label>Select Role</label>
                            </div>
                            <center>
                                <button class="btn waves-effect waves-light teal" type="submit">Submit</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="striped">
            <thead>
                <th>Email</th>
                <th>Role</th>
                {{--<th>Action</th>--}}
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    {{--<td>Delete</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>



    </div>
</center>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });
    $(document).ready(function() {
        $('select').material_select();
    });

</script>
</body>
</html>