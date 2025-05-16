<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
{
    $socialUser = Socialite::driver($provider)->stateless()->user();

    $user = User::updateOrCreate(
        ['email' => $socialUser->getEmail()],
        [
            'name' => $socialUser->getName(),
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
            'password' => bcrypt(Str::random(16)),
        ]
    );

    // Assign default role if user is new
    if (!$user->hasAnyRole(['admin', 'editor', 'reader'])) {
        $user->assignRole('reader'); // default role
    }

    Auth::login($user);
    return redirect('/dashboard');
}

}
