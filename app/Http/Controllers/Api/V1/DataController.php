<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Artisan;
use App\Http\Filters\V1\DataFilter;
use App\Http\Resources\V1\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataFilter $filters)
    {
        return DataResource::collection(Data::filter($filters)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $exitCode = Artisan::call('speedtest:run');

            if ($exitCode === 0) {
                return response()->json(['message' => 'New Data created'], 200);
            } else {
                return response()->json(['message' => 'Speedtest command failed'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        return new DataResource($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        $data->delete();

        return response()->json(['message' => 'Resource deleted successfully.'], 200);
    }
}
