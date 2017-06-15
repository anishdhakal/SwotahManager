<?php

namespace App\Http\Controllers;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class AttendanceController extends Controller
{

    public function punchIn(Request $request){
        $attendance= new Attendance();
        $attendance->user_id=$request->user_id;
        $attendance->date=$request->date;
        $attendance->punch_in= $request->time;
        $attendance->save();
        Session::put('attendance',$attendance);
        Session::forget('a');
        Session::put('a',1);
        return view('index');

    }

    public function punchout(Request $request){
        $attendance = Attendance::find($request->id);
        $attendance->status= $request->status;
        $attendance->punch_out = Carbon::now()->toTimeString();
        $attendance->update();
        Session::flush();
        return redirect('/');

    }
    public function view(Request $request){
        $input = $request->all();
        if($input['email'] == ''){
            $input['email'] = null;
        }


        if($input['email'] != null && $input['date'] != null){
            $date=date('Y-m-d',strtotime($input['date']));
            $emailDate=Attendance::where([
                ['date','=',$date],
                ['user_id','=',$input['email']]
            ])->latest('date')->get();
            return view('attendance',compact('emailDate'));

        }
        elseif($input['email'] != null){
            $email_only = Attendance::where('user_id','=',$input['email'])->latest('date')->get();
            $year = (array) DB::select('select DISTINCT YEAR(date) as year from attendance');
//            dd($year);
            return view('attendance',compact('email_only','year'));
        }
        elseif($input['date'] != null){
            $date=date('Y-m-d',strtotime($input['date']));
            $date_only = Attendance::where('date','=',$date)->get();
            return view('attendance',compact('date_only'));
        }else{
            $all = Attendance::latest('date')->get();
            return view('attendance',compact('all'));
        }


    }
}
