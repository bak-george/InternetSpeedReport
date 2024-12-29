<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\View\View;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();

        return view('results.index')->with('data', $data);
    }

    public function show(Data $data)
    {
        return view('data.show')->with('data', $data);
    }
}
