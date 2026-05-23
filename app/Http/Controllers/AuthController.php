<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use Google\Client as GoogleClient;

class AuthController extends Controller
{
  public function showLoginForm()
  {
    return view('login');
  }

  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    $googleUser = Socialite::driver('google')->user();
    // Handle the authenticated user (e.g., create or update a local user record)
    $user = User::updateOrCreate(
      ['email' => $googleUser->getEmail()],
      [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => Hash::make(str()->random(16)),
      ],
    );

    // Descargar el avatar del usuario de Google
    if ($googleUser->getAvatar()) {
      $avatarContent = file_get_contents($googleUser->getAvatar());
      $avatarName = 'avatars/' . $user->id . '.jpg';
      Storage::disk('public')->put($avatarName, $avatarContent);
      $user->avatar = '/storage/' . $avatarName;
      $user->save();
    }
  }
}
