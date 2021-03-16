<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function redirectToProvider($provider): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreate($user, $provider);
        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    public function findOrCreate($user, $provider)
    {
        $authUser = User::where('provider', $user->id)
            ->orWhere('email', $user->email)
            ->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name'      => $user->name,
            'email'     => $user->email,
            'password'  => bcrypt('default123'),
            'provider'  => $provider,
            'provider_id'=> $user->id,
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
}
