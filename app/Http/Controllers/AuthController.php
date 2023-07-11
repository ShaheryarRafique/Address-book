<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/login');
    }
    
    function showLogin()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            $request->session()->put('user', $user);
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/login');
        }
    }

    function register()
    {
        return view('auth.register-page-one');
    }

    function showRegisterStep2()
    {
        return view('auth.register-page-second');
    }

    public function registerStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $request->session()->put('step1', $validatedData);

        // Clear the input fields
        $request->replace([]);

        return Redirect::to('/register/step2');
    }

    public function registerStep2(Request $request)
    {
        $step1Data = $request->session()->get('step1');

        if (!$step1Data) {
            return Redirect::to('/register/step1');
        }

        $validatedData = $request->validate([
            'password' => 'required|min:6|confirmed',
            // Add more validation rules as needed
        ]);

        $registrationData = array_merge($step1Data, $validatedData);

        // Store the registration data in the database

        $name = $registrationData['name'];
        $email = $registrationData['email'];
        $password = $registrationData['password'];

        // Your database insert code here
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        // Clear the input fields
        $request->replace([]);

        // Clear the session data
        $request->session()->forget('step1');

        return Redirect::to('/login');
    }
}
