<?php

namespace App\Http\Controllers;

use App\Models\FakeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
                         ->get()
                         ->values();

        return view('pages.api-display', ['userTokens' => $userTokens]);
    }

    public function generateToken()
    {
        $user = Auth::user();

        $email = $user->email;
        $password = 'password';

        if (App::environment('production')) {
            $url = 'https://internetspeedreport-main-fcstuy.laravel.cloud';
        } else {
            $url = 'http://internetspeedreport.test';
        }

        Http::post("{$url}/api/v1/login", [
            'email' => $email,
            'password' => $password,
        ]);

        if (App::environment('production')) {
            $countTokens = DB::table('personal_access_tokens')->count();

            if ($countTokens > 3) {
                $lastRow = DB::table('personal_access_tokens')
                                ->orderBy('created_at', 'asc')
                                ->first();

                $this->deleteToken($lastRow->id);
            }
        }

        return redirect()->route('api')->with('success', 'New token created');
    }

    public function deleteToken($tokenId)
    {
        $token = PersonalAccessToken::find($tokenId);
        $countTokens = DB::table('personal_access_tokens')->count();

        if (App::environment('production') && $countTokens <= 3) {
            return redirect()->route('api')->with('error', 'This is a demo, so let some keys here.');
        } else {
            $token->delete();
        }

       return redirect()->route('api')->with('success', 'API Token deleted');
    }
}
