<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users=User::all();
        return view('admin.users',compact('users'));
    }
}
