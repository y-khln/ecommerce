<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller

class RegisterController extends Controller
{
    public function save(Request $request){
        $validateFields = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
    }
}
