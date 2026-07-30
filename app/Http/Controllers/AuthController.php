<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function showLoginForm()
  {
    return view('login');
  }

  public function redirectToGoogle()
  {
    return Socialite::driver('google')
      ->with([
        'prompt' => 'login'
      ])
      ->redirect();
  }

  public function handleGoogleCallback()
  {
    $googleUser = Socialite::driver('google')
      ->stateless()
      ->user();

    $user = User::updateOrCreate(
      [
        'email' => $googleUser->getEmail()
      ],
      [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => Hash::make(str()->random(16)),
      ]
    );


    if ($googleUser->getAvatar()) {

      $avatarContent = file_get_contents(
        $googleUser->getAvatar()
      );

      $avatarName = 'avatars/' . $user->id . '.jpg';

      Storage::disk('public')
        ->put($avatarName, $avatarContent);


      $user->avatar = '/storage/' . $avatarName;
      $user->save();
    }


    Auth::login($user);


    return redirect()
      ->route('products.index')
      ->with('success', '¡Inicio de sesión exitoso!');
  }
}
