<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
   public function delete(User $user)
   {
        $user->delete();

        return redirect()->route('register')->with('success', 'You account has been deleted.');
   }
}
