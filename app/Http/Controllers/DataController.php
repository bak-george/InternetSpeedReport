<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::orderBy('created_at', 'desc')->get();

        return view('results.index')->with('data', $data);
    }

    public function show(Data $data)
    {
        return view('data.show')->with('data', $data);
    }

    public function destroy(Data $data)
    {
        $data->delete();

        return redirect('/')->with('success', 'Data deleted successfully!');
    }

    public function runSpeedTest()
    {
        Artisan::call('speedtest:run');

        return Redirect::back()->with('success', 'Speedtest completed successfully!');
    }
}
