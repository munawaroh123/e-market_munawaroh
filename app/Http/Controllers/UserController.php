<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest as RequestsAuthRequest;
use Closure;
use Illuminate\Http\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index (){
        if($user = Auth::user()){
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
        }
        return view('auth.login');
    }
    public function cekLogin(RequestsAuthRequest $request){
        $credential = $request-> only('email', 'password');
        $request->session()->regenerate();
        if(Auth::attempt($credential)){
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nofound'=>'Email or Password is wrong'
            ])->onlyInput('email');
        }


        public function logout(Request $request){
            Auth::logout();
            $request-> session()->invalidate();
            $request-> session()->regenerateToken();
            
            return redirect('/login');
        }
    }
class cekUserLogin
{
    public function handle(Request $request, Closure $next, $rules)
    {
        $user = Auth::user();

        if(!Auth::check()){
            return redirect('login');
        }
        if($user->level == $rules)
            return $next($request);
        return redirect('login')->with('error', 'you have no privildge');
    }
}