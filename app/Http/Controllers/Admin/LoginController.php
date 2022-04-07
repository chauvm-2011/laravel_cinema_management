<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function postLogin(LoginPostRequest $request)
    {
        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => 0,
            ], $request->input('remember'))) {
            if (Auth::user()->email_verified_at !== null ) {
                return redirect()->route('home');
            } else {
                $users = User::query()->get();
                foreach ($users as $user) {
                    if ($user->email == $request->input('email')) {
                        Mail::send('verify', compact('user'), function($email) use ($user) {
                            $email->subject('Demo test email');
                            $email->to($user->email, $user->name);
                        });
                    }
                }
            }
        }

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => 1,
        ], $request->input('remember'))) {
            if (Auth::user()->email_verified_at !== null ) {
                return redirect()->route('main-login');
            } else {
                $users = User::query()->get();
                foreach ($users as $user) {
                    if ($user->email == $request->input('email')) {
                        Mail::send('verify', compact('user'), function($email) use ($user) {
                            $email->subject('Demo test email');
                            $email->to($user->email, $user->name);
                        });
                    }
                }
            }
        }

        return redirect()->route('login')->with('error', 'Email or password incorrect!');
    }
    public function accept(User $user, $token)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if ($user->token === $token){
            $user->update(['email_verified_at' => $dt->toDateTimeString(), 'token' => null]);
            return redirect()->route('login')->with('message', 'You have successfully authenticated, please login');
        } else {
            return redirect()->route('login')->with('error', 'Invalid verification code');
        }
    }
}
