<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\View\View;

class DataController extends Controller
{
    public function show()
    {
        return view('data.show')->with('data', Data::all());
    }
}
