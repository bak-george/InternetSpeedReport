<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
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
        //
    }
}
