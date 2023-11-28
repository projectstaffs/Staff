<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Religion;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('religions')) { Cache::put('religions', Religion::all()); }
        $getItems = Cache::get('religions');
        return $getItems;
        //return Religion::orderBy('created_at', 'desc')->get();
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
        $religion = new Religion([
            'title' => $request->title
        ]);
        $religion->save(); 
        
        Cache::put('religions', Religion::all());
        return response()->json('The religion successfully added');
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
        $religion = Religion::find($id);
        $religion->title = $request['title']; 
        $religion->save();

        Cache::put('religions', Religion::all());
        return response()->json(["The religion successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $religion = Religion::find($id);
        $religion->delete();        

        Cache::put('religions', Religion::all());
        return response()->json('The religion successfully deleted');
    }
}
