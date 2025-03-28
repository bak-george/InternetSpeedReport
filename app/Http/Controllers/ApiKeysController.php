<?php

namespace App\Http\Controllers;

use App\Models\FakeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Str;

class ApiKeysController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userTokens = DB::table('user_tokens')
                         ->where('user_id', $user->id)
                         ->get()
                         ->values();

        return view('pages.api-display', ['userTokens' => $userTokens]);
    }

    public function generateToken()
    {
        $user = Auth::user();

        $email = $user->email;

        $countTokens = DB::table('user_tokens')->count();

        if (App::environment('production') && $countTokens > 5) {
            return redirect()->route('api')->with('error', 'Demo: Max tokens reached');
        }

        if (App::environment('production')) {
            $token = 'demo_token' . Str::random(20);
        } else {
            $url = config('app.url');

            $data = Http::post("{$url}/api/v1/login", [
                'email' => $email,
                'password' => 'password'
            ]);

            $response = $data->json();
            $token = $response['data']['token'];
        }

        DB::table('user_tokens')->insertGetId([
            'user_id' => $user->id,
            'token'   => $token
        ]);

        return redirect()->route('api')->with('success', 'New token created');
    }

    public function deleteToken($id)
    {
        $countTokens = DB::table('user_tokens')->count();

        if (App::environment('user_tokens') && $countTokens <= 2) {
            return redirect()->route('api')->with('error', 'Demo: Minimum tokens reached');
        } else {
            DB::table('user_tokens')->where('id', '=', $id)->delete();
        }

       return redirect()->route('api')->with('success', 'API Token deleted');
    }
}
