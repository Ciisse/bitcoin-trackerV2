<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

class TokenController extends Controller
{
    public function getToken($tokenurl)
    {
        $data = Auth::user();
        $token = $data->token;

        if ($token != $tokenurl) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $data = [
            $data['name'],
            $data['balance'],
            $data['bitcoin'],
        ];

        return response()->json($data);
    }
}
