<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\HousekeeperDutie;

class HousekeeperDutieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HousekeeperDutie::orderBy('created_at', 'desc')->get();
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
        $housekeeperDutie = new HousekeeperDutie([
            'title' => $request->title
        ]);
                
        $housekeeperDutie->save();        
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
        $housekeeperDutie = HousekeeperDutie::find($id);
        $housekeeperDutie->title = $request['title'];       

        $housekeeperDutie->save();
        return response()->json(["The housekeeperDutie successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $housekeeperDutie = HousekeeperDutie::find($id);
        $housekeeperDutie->delete();        

        return response()->json('The housekeeperDutie successfully deleted');
    }
}
