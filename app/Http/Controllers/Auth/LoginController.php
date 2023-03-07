<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //login menggunakan google
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    //respon ketika login
    public function GoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $existingUser = User::where('google_id', $user->id)->first();
        // Proses autentikasi pengguna di sini
        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->role = $user->role='0';
            $newUser->save();
    
            Auth::login($newUser, true);
        }
        return redirect('home');
    }
}
