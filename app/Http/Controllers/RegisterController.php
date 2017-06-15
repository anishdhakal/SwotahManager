<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, array(
            'email'         => 'required|email',
            'password'  => 'required',
        ));

        // store in the database
        $role = $request->role;
        $pass=md5($request->password);
        $user = new User();
        $user->email = $request->email;
        $user->password = $pass;
        $user->role = $role;
        $user->save();
        return redirect('/user');
    }
}
