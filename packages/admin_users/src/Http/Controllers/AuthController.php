<?php

namespace Package\AdminUser\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        if (Auth::check()) {
            return redirect('/');
        } else {
    	   return view('AdminUser::auth.login');
        }
    }

    public function setLogin(Request $requests){
        $name = $requests->name;
        $password = $requests->password;
        $remember = $requests->remember;

        // kiểm tra có phải Email không, nếu là email thì sẽ login theo Email
        $field = filter_var($name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $requests->merge([$field => $name]);
        
        // Thực thi đăng nhập
        $credentials = $requests->only($field, 'password');
        if (Auth::attempt($credentials, $remember)) {
            if (Auth::user()->status == 1 || Auth::user()->id == 1) {
                return [
                    'status' => 1,
                    'message' => 'Đăng nhập thành công',
                    'url' => $url ?? route('admin.pages.create')
                ];
            } else {
                Auth::logout();
                return [
                    'status' => 2,
                    'message' => 'Tài khoản của bạn hiện không hoạt động',
                ];
            }
        } else {
            return [
                'status' => 2,
                'message' => 'Đăng nhập không thành công',
            ];
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        if (!Auth::check() && !Auth::check()) {
            $request->session()->flush();
            $request->session()->regenerate();
        }
        return redirect(route('admin.login'));
    }
}
