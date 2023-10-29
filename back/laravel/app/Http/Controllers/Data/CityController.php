<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('cities')) { Cache::put('cities', City::all()); }
        $getItems = Cache::get('cities');
        return $getItems;
        //return City::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = new City([
            'title' => $request->title
        ]);        
        $city->save(); 
        
        Cache::put('cities', City::all());
        return response()->json('The city successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::find($id);
        $city->title = $request['title'];
        $city->save();

        Cache::put('cities', City::all());
        return response()->json(["The city successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();        

        Cache::put('cities', City::all());
        return response()->json('The city successfully deleted');
    }
}
