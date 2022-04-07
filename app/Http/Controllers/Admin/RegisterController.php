<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
            $user = User::orderbyDesc('id')->first();
            Mail::send('verify', compact('user'), function($email) use ($user) {
                $email->subject('Demo test email');
                $email->to($user->email, $user->name);
            });
            return redirect()->route('login')->with('message', 'Register succesfully!Please  <a href ="https://mail.google.com">click here to verify your account</a>');
        }

        return redirect()->route('register');
    }

    public function createUser(array $data)
    {
        $token = strtoupper(Str::random(20));
        return User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => $token,
        ]);
    }
    public function accept(User $user, $token)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if ($user->token === $token){
            $user->update(['email_verified_at' => $dt->toDateTimeString(),  'token' => null]);
            return redirect()->route('login')->with('message', 'You have successfully authenticated, please login');
        } else {
            return redirect()->route('login')->with('error', 'Invalid verification code');
        }
    }
}
