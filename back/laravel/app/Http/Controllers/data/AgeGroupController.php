<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\AgeGroup;

class AgeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AgeGroup::orderBy('created_at', 'desc')->get();
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
        $agegroup = new AgeGroup([
            'title' => $request->title
        ]);
                
        $agegroup->save();        
        return response()->json('The agegroup successfully added');
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
        $agegroup = AgeGroup::find($id);
        $agegroup->title = $request['title'];       

        $agegroup->save();
        return response()->json(["The agegroup successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agegroup = AgeGroup::find($id);
        $agegroup->delete();        

        return response()->json('The agegroup successfully deleted');
    }
}
