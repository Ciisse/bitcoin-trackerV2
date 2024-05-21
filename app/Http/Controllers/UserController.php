<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password_hash' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Logged in successfully'], 200);
        }

        return response()->json(['error' => 'The provided credentials do not match our records.'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'username' => 'sometimes|required|max:255|unique:users,username,' . $user->id,
            'email' => 'sometimes|required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6'
        ]);

        if ($request->has('password')) {
            $validatedData['password_hash'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);
        return response()->json(['user' => $user], 200);
    }

public function updateBalance(Request $request, $userId, $operation)
{
    $user = User::findOrFail($userId);

    $validatedData = $request->validate([
        'balance' => 'required|numeric'
    ]);

    if ($operation == 'withdraw') {
        if ($user->balance < $validatedData['balance']) {
            return back()->with('error', 'Insufficient balance.');
        }
        $newBalance = $user->balance - $validatedData['balance'];
    } else {
        $newBalance = $user->balance + $validatedData['balance'];
    }

    $newTotalInvested = $user->totalInvested + $validatedData['balance'];

    $user->update([
        'totalInvested' => $newTotalInvested,
        'balance' => $newBalance
    ]);

    return redirect()->route('dashboard')->with('success', 'Balance successfully updated.');
    }
}

