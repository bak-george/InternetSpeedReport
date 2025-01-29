<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class ApiKeys extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userTokens = DB::table('personal_access_tokens')
                         ->where('tokenable_id', $user->id)
                         ->get();

        return view('pages.api-display', ['userTokens' => $userTokens]);
    }

    public function deleteToken(Request $request, $tokenId)
    {
        $token = PersonalAccessToken::find($tokenId);

        $token->delete();

       return redirect()->route('api')->with('success', 'API Token deleted');
    }
}
