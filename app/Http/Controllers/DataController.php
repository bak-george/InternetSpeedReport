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
        $userId = auth()->id();

        $dataIds = DB::table('user_data')
            ->where('user_id', $userId)
            ->pluck('data_id');

        $dataPaginated = Data::whereIn('id', $dataIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $data = Data::whereIn('id', $dataIds)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('results.index', [
            'data' => $data,
            'dataPaginated' => $dataPaginated,
        ]);
    }

    public function show(Data $data)
    {
        $userId = auth()->id();

        $exists = DB::table('user_data')
            ->where('user_id', $userId)
            ->where('data_id', $data->id)
            ->exists();

        if (!$exists) {
            abort(403, 'Unauthorized');
        }

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
        $user = auth()->user();

        if ($user && $data) {
            $user->data()->attach($data->id);
        }

        return redirect('data/' . $data->id)->with('success', 'Data created successfully!');
    }
}
