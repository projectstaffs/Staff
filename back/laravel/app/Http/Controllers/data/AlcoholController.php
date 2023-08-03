<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\Alcohol;

class AlcoholController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Alcohol::orderBy('created_at', 'desc')->get();
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
        $alcohol = new Alcohol([
            'title' => $request->title
        ]);
                
        $alcohol->save();        
        return response()->json('The alcohol successfully added');
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
        $alcohol = Alcohol::find($id);
        $alcohol->title = $request['title'];       

        $alcohol->save();
        return response()->json(["The alcohol successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alcohol = Alcohol::find($id);
        $alcohol->delete();        

        return response()->json('The alcohol successfully deleted');
    }
}
