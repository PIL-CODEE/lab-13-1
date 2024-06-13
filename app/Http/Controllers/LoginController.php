<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function register(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tipo_usuario = $request->tipo_usuario;

        $user->save();

        Auth::login($user);

        return redirect(route('usuario.index'));
    }
    
    public function login(Request $request){

        $credentials = [
            "email"=>$request->email,
            "password"=>$request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            
            $request->session()->regenerate();

            return redirect()->intended(route('usuario.index'));

        } else {
            return redirect(route('usuario.login'));
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('usuario.login'));
    }
}
