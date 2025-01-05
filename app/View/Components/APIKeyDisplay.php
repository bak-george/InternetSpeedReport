<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class APIKeyDisplay extends Component
{
    public $apiKey;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        try {
            $user = User::first();

            if (!$user || !$user->email || !$user->password) {
                $this->apiKey = 'No valid user found in the database. Run php artisan db:seed to generate a user.';
                return;
            }

            $email = $user->email;
            $password = 'password';

            $response = Http::post('http://internetspeedreport.test/api/v1/login', [
                'email' => $email,
                'password' => $password,
            ]);

            if ($response->successful() && isset($response->json()['data']['token'])) {
                $this->apiKey = $response->json('data.token');
            } else {
                $this->apiKey = 'Unable to retrieve API key.';
            }
        } catch (\Exception $e) {
            $this->apiKey = 'Error: ' . $e->getMessage();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.api-key-display');
    }
}
