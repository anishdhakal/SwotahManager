<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required'
        ));
        $pass =md5($request->password);

        $user = User::where([
            ['email','=',$request->email],
            ['password','=',$pass]
        ])->first();
        if(isset($user)){
            Session::put('user',$user);
            session(['loginMessage' => 'You are logged in']);

            $attendance = Attendance::where([
                ['date','=',Carbon::now()->toDateString()],
                ['user_id','=',$user->id]
            ])->first();
            Session::put('attendance',$attendance);
            if(isset($attendance)){

                Session::put('a',1);
            }else{
                Session::put('a',0);
            }
            return view('index');
        }else{
            return redirect()->back();
        }
    }

}
