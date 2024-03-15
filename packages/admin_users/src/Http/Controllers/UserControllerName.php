<?php

namespace Package\AdminUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserControllerName extends Controller
{
    public function login(){
        return view('AdminUser::admin_users.index');
    }
}
