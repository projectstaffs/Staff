<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\HouseKeeperDutie;

class HousekeeperDutieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('housekeeperduties')) { Cache::put('housekeeperduties', HouseKeeperDutie::all()); }
        $getItems = Cache::get('housekeeperduties');
        return $getItems;
        //return HousekeeperDutie::orderBy('created_at', 'desc')->get();
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
        $housekeeperDutie = new HouseKeeperDutie([
            'title' => $request->title
        ]);
        $housekeeperDutie->save();  
        
        Cache::put('housekeeperduties', HouseKeeperDutie::all());
        return response()->json('The housekeeperDutie successfully added');
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
        $housekeeperDutie = HouseKeeperDutie::find($id);
        $housekeeperDutie->title = $request['title'];
        $housekeeperDutie->save();

        Cache::put('housekeeperduties', HouseKeeperDutie::all());
        return response()->json(["The housekeeperDutie successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $housekeeperDutie = HouseKeeperDutie::find($id);
        $housekeeperDutie->delete();        

        Cache::put('housekeeperduties', HouseKeeperDutie::all());
        return response()->json('The housekeeperDutie successfully deleted');
    }
}
