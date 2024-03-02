<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   
    public function index() {
        $user = User::all();

        return view('user.list-user', compact('user'));

    }

}
