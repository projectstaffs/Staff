<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\Diagnose;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Diagnose::orderBy('created_at', 'desc')->get();
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
        $diagnose = new Diagnose([
            'title' => $request->title
        ]);
                
        $diagnose->save();        
        return response()->json('The diagnose successfully added');
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
        $diagnose = Diagnose::find($id);
        $diagnose->title = $request['title'];       

        $diagnose->save();
        return response()->json(["The diagnose successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnose = Diagnose::find($id);
        $diagnose->delete();        

        return response()->json('The diagnose successfully deleted');
    }
}
