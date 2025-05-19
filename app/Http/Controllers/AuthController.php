<?php

namespace App\Http\Controllers;

use App\Jobs\SendRegistrationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function ShowFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/students');
        }
        return back()->with('error', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|confirmed|min:1',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('student');
        auth()->login($user);
        dispatch(new SendRegistrationEmail($user, $request->email));
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Mời bạn đăng nhập.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Bạn không thể xóa chính mình!');
        }

        $user->delete();

        return redirect()->route('list-account')->with('success', 'Đã xóa tài khoản thành công!');
    }
}
