<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\View\View;

class DataController extends Controller
{
    public function show()
    {
        $data = Data::all();

        return view('results.index')->with('data', $data);
    }
}
