<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            dd($googleUser);
            Log::info('Google user data: ', (array) $googleUser);
            $this->_registerOrLoginUser($googleUser);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('Error during Google callback: ', ['error' => $e->getMessage()]);
            return redirect('/')->with('error', 'Something went wrong, please try again.');
        }
    }

    protected function _registerOrLoginUser($data)
    {
        if (!$data || !$data->email) {
            return redirect('/')->with('error', 'Invalid data from Google.');
        }

        $user = User::where('email', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name ?? 'Unknown';
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar ?? '';
            $user->save();
        }

        Auth::login($user);
    }
}
