<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Diagnose;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('diagnoses')) { Cache::put('diagnoses', Diagnose::all()); }
        $getItems = Cache::get('diagnoses');
        return $getItems;
        //return Diagnose::orderBy('created_at', 'desc')->get();
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
            'title' => [
               'en' => $request->en,
               'ua' => $request->ua
            ],
        ]);
        $diagnose->save(); 
        
        Cache::put('diagnoses', Diagnose::all());
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
        $diagnose->title = [
               'en' => $request->title['en'],
               'ua' => $request->title['ua']
            ];
        $diagnose->save();

        Cache::put('diagnoses', Diagnose::all());
        return response()->json(["The diagnose successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnose = Diagnose::find($id);
        $diagnose->delete();        

        Cache::put('diagnoses', Diagnose::all());
        return response()->json('The diagnose successfully deleted');
    }
}
