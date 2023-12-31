<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SocialAuthService
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // Trova l'utente nel database o creane uno nuovo
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?: 'SocialUser', // Fornisci un valore di default se il nome non è disponibile
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(uniqid()), // Genera una password casuale
                'terms_accepted' => true, // Assumi che l'utente accetti i termini
                'city' => 'N/A', // Valore di default
                'prov' => 'N/A', // Valore di default
                'birthday' => now(), // Data di default
                'email_verified_at' => now() // Verifica immediata dell'email
            ]
        );

        // Effettua il login dell'utente
        Auth::login($user, true);

        // Reindirizza l'utente dove preferisci
        return redirect()->intended('dashboard');
    }
}