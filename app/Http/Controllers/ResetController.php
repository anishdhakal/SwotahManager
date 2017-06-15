<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function reset(Request $request){
        $user = User::find($request->id);
        $user->password=md5($request->password);
        $user->update();
        return redirect('/dash');
    }
}
