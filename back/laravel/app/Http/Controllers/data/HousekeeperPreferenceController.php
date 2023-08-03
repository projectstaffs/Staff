<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\HousekeeperPreference;

class HousekeeperPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HousekeeperPreference::orderBy('created_at', 'desc')->get();
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
        $housekeeperPreference = new HousekeeperPreference([
            'title' => $request->title
        ]);
                
        $housekeeperPreference->save();        
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
        $housekeeperPreference = HousekeeperPreference::find($id);
        $housekeeperPreference->title = $request['title'];       

        $housekeeperPreference->save();
        return response()->json(["The housekeeperPreference successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $housekeeperPreference = HousekeeperPreference::find($id);
        $housekeeperPreference->delete();        

        return response()->json('The housekeeperPreference successfully deleted');
    }
}
