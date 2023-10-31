<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\HouseKeeperPreference;

class HousekeeperPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('housekeeperpreferences')) { Cache::put('housekeeperpreferences', HouseKeeperPreference::all()); }
        $getItems = Cache::get('housekeeperpreferences');
        return $getItems;
        //return HouseKeeperPreference::orderBy('created_at', 'desc')->get();
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
        $housekeeperPreference = new HouseKeeperPreference([
            'title' => $request->title
        ]);
        $housekeeperPreference->save();   
        
        Cache::put('housekeeperpreferences', HouseKeeperPreference::all());
        return response()->json('The housekeeperPreference successfully added');
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
        $housekeeperPreference = HouseKeeperPreference::find($id);
        $housekeeperPreference->title = $request['title'];
        $housekeeperPreference->save();

        Cache::put('housekeeperpreferences', HouseKeeperPreference::all());
        return response()->json(["The housekeeperPreference successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $housekeeperPreference = HouseKeeperPreference::find($id);
        $housekeeperPreference->delete();        

        Cache::put('housekeeperpreferences', HouseKeeperPreference::all());
        return response()->json('The housekeeperPreference successfully deleted');
    }
}
