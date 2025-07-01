<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
            return Socialite::driver('facebook')->redirect();
        // return Socialite::driver('facebook')
        //     ->scopes(['email'])
        //     ->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'password' => bcrypt('defaultpassword'),
                    'dob' => null,
                    'sexe' => 'non défini',
                ]
            );

            Auth::login($user);

            return redirect()->intended('/');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Erreur de connexion via Facebook.']);
        }
    }
}
