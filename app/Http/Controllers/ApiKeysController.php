<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;

class ApiKeysController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userTokens = DB::table('personal_access_tokens')
                         ->where('tokenable_id', $user->id)
                         ->get();

        return view('pages.api-display', ['userTokens' => $userTokens]);
    }

    public function generateToken()
    {
        $user = Auth::user();

        $email = $user->email;
        $password = 'password';

        $response = Http::post('http://internetspeedreport.test/api/v1/login', [
            'email' => $email,
            'password' => $password,
        ]);

        return redirect()->route('api')->with('success', 'New token created');
    }

    public function deleteToken($tokenId)
    {
        $token = PersonalAccessToken::find($tokenId);

        $token->delete();

       return redirect()->route('api')->with('success', 'API Token deleted');
    }
}
