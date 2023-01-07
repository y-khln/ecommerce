<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if(Auth::check()){
            return redirect()->to(route('user.admin'));
        }

        $user = new User();
        $user->login=$request->login;
        $user->password=$request->password;

        if(User::where('login',$user->login)->exists()){
            return redirect()->to(route('user.registration'))->withErrors([
                'login' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        $user -> save();
        $employees = Employee::all();

        if($user){
            Auth::login($user);
            return view('admin',compact('employees'));
        }
        return redirect()->to(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении ползователя'
        ]);
    }
}
