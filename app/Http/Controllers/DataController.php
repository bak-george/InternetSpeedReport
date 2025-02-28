<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DataController extends Controller
{
    public function index()
    {
        $dataPaginated = Data::orderBy('created_at', 'desc')->paginate(10);

        $data = Data::orderBy('created_at', 'asc')->get();

        return view('results.index', ['data' => $data, 'dataPaginated' => $dataPaginated]);
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
        $countTokens = DB::table('data')->count();
        $isLocal = App::environment('local');

        //production env = demo env
        $canCreateData = App::environment('production') && $countTokens < 26;

        $key = 'error';
        $msg = 'Demo: Maximum Data Reached.';
        $redirectPath = '/';

        if ($canCreateData) {
            Data::factory()->create();
        } elseif ($isLocal) {
            Artisan::call('speedtest:run');
        }

        if ($canCreateData || $isLocal) {
            $key = 'success';
            $msg = 'Data created successfully!';
            $data = Data::latest()->first();
            $redirectPath = 'data/' . $data->id;
        }

        return redirect($redirectPath)->with($key, $msg);
    }
}
