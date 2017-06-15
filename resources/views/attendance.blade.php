<!doctype html>
<html lang="en">
<head>
    <title>Swotah Attendance</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

    <style>

    </style>

</head>
<body style="background-color:#ffffff">
@include('layout.adminnav')
        @if(isset($all))
            <div class="container">
            <table class="striped responsive-table">
                <thead>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Punch In</th>
                    <th>Punch Out</th>
                    <th>Total Time</th>
                    <th>Status</th>
                </thead>
                <tbody>
                @foreach($all as $att)
                    <tr>
                        <td>{{$att->date}}</td>
                        <td>{{$att->users->email}}</td>
                        <td>{{$att->punch_in}}</td>
                        <td>{{$att->punch_out}}</td>
                        <td>
                            @if($att->punch_out != null)
                                <?php
                                $punch_in=new DateTime($att->punch_in);
                                $punch_out=new DateTime($att->punch_out);
                                $interval = $punch_out->diff($punch_in);
                                echo $hour = $interval->format('%h hr').' '.$interval->format('%i min');
                                ?>
                            @endif
                        </td>
                        <td>
                            <?php $stat = explode(',',$att->status);
                            ?>
                            @foreach($stat as $st)
                                <li>{{$st}}</li>
                            @endforeach

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(isset($emailDate))

                <table class="striped responsive-table">
                <thead>
                <th>Date</th>
                <th>Email</th>
                <th>Punch In</th>
                <th>Punch Out</th>
                <th>Total Time(h:m)</th>
                <th>Status</th>
                </thead>
                <tbody>
                @foreach($emailDate as $att)
                    <tr>
                        <td>{{$att->date}}</td>
                        <td>{{$att->users->email}}</td>
                        <td>{{$att->punch_in}}</td>
                        <td>{{$att->punch_out}}</td>
                        <td>
                            @if($att->punch_out != null)
                                <?php
                                    $punch_in=new DateTime($att->punch_in);
                                    $punch_out=new DateTime($att->punch_out);
                                    $interval = $punch_out->diff($punch_in);
                                    echo $interval->format('%h').':'.$interval->format('%i');
                                 ?>
                            @endif
                        </td>
                        <td>
                            <?php $stat = explode(',',$att->status);
                            ?>
                            @foreach($stat as $st)
                                <li>{{$st}}</li>
                            @endforeach

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(isset($email_only))
                {{--<form action="/attendancedetail">--}}
                    {{--<select name="month">--}}
                        {{--<option value="" disabled selected>Select a month</option>--}}
                        {{--<option value = "01">Jan</option>--}}
                        {{--<option value = "02">Feb</option>--}}
                        {{--<option value = "03">Mar</option>--}}
                        {{--<option value = "04">Apr</option>--}}
                        {{--<option value = "05">May</option>--}}
                        {{--<option value = "06">Jun</option>--}}
                        {{--<option value = "07">Jul</option>--}}
                        {{--<option value = "08">Aug</option>--}}
                        {{--<option value = "09">Sep</option>--}}
                        {{--<option value = "10">Oct</option>--}}
                        {{--<option value = "11">Nov</option>--}}
                        {{--<option value = "12">Dec</option>--}}
                    {{--</select>--}}
                    {{--<select name="year">--}}
                        {{--<option value="" disabled selected>Select a year</option>--}}
                        {{--@foreach($year as $y)--}}
                            {{--<option value = {{$y->year}}>{{$y->year}}</option>--}}
                            {{--{{dd($y)}}--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</form>--}}
                <table class="striped responsive-table">
                <thead>
                <th>Date</th>
                <th>Email</th>
                <th>Punch In</th>
                <th>Punch Out</th>
                <th>Total Time</th>
                <th>Status</th>
                </thead>
                <tbody>
                @foreach($email_only as $att)
                    <tr>
                        <td>{{$att->date}}</td>
                        <td>{{$att->users->email}}</td>
                        <td>{{$att->punch_in}}</td>
                        <td>{{$att->punch_out}}</td>
                        <td>
                            @if($att->punch_out != null)
                                <?php
                                $punch_in=new DateTime($att->punch_in);
                                $punch_out=new DateTime($att->punch_out);
                                $interval = $punch_out->diff($punch_in);
                                echo $hour = $interval->format('%h').':'.$interval->format('%i');
                                ?>
                            @endif
                        </td>
                        <td>
                            <?php $stat = explode(',',$att->status);
                            ?>
                            @foreach($stat as $st)
                                <li>{{$st}}</li>
                            @endforeach

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(isset($date_only))

                <table class="striped responsive-table">
                <thead>
                <th>Date</th>
                <th>Email</th>
                <th>Punch In</th>
                <th>Punch Out</th>
                <th>Total Time</th>
                <th>Status</th>
                </thead>
                <tbody>
                @foreach($date_only as $att)
                    <tr>
                        <td>{{ $att->date }}</td>
                        <td>{{ $att->users->email }}</td>
                        <td>{{ $att->punch_in }}</td>
                        <td>{{ $att->punch_out }}</td>
                        <td>
                            @if($att->punch_out != null)
                                <?php
                                $punch_in=new DateTime($att->punch_in);
                                $punch_out=new DateTime($att->punch_out);
                                $interval = $punch_out->diff($punch_in);
                                echo $hour = $interval->format('%h').':'.$interval->format('%i');
                                ?>
                            @endif
                        </td>
                        <td>
                            <?php $stat = explode(',',$att->status);
                            ?>
                            @foreach($stat as $st)
                                <li>{{$st}}</li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
</html>