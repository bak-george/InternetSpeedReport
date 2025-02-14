<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;


class DataController extends Controller
{
    public function index()
    {
        $data = Data::orderBy('created_at', 'asc')->get();

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
        if (App::environment('production')) {
            Data::factory()->create();
        } else {
            Artisan::call('speedtest:run');
        }

        $data = Data::orderBy('created_at', 'desc')->first();

        session()->flash('success', 'Speedtest completed successfully!');

        return redirect('data/' . $data->id);
    }
}
