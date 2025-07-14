<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $dataPaginated = Data::orderBy('created_at', 'desc')->paginate(10);

        $data = Data::orderBy('created_at', 'asc')->get();

        return view('results.index', [
                 'data' => $data,
                 'dataPaginated' => $dataPaginated,
                ]
            );
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

        $data = Data::latest()->first();

        return redirect('data/' . $data->id)->with('success', 'Data created successfully!');
    }
}
