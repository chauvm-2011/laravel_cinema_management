<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('home');
        } else {
            return view('register');
        }
    }

    public function postRegister(RegisterPostRequest $request)
    {
        $data = $request->all();
        $check = $this->createUser($data);

        if ($check) {
            return redirect()->route('login')->with('message', 'Register succesfully!');
        }

        return redirect()->route('register');
    }

    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
