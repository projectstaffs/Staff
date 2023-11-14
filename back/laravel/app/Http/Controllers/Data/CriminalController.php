<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\data\Criminal;

class CriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('criminals')) { Cache::put('criminals', Criminal::all()); }
        $getItems = Cache::get('criminals');
        return $getItems;
        //return Criminal::orderBy('created_at', 'desc')->get();
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
        $criminal = new Criminal([
            'title' => $request->title
        ]);
        $criminal->save(); 
        
        Cache::put('criminals', Criminal::all());
        return response()->json('The criminal successfully added');
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
        $criminal = Criminal::find($id);
        $criminal->title = $request['title'];
        $criminal->save();

        Cache::put('criminals', Criminal::all());
        return response()->json(["The criminal successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $criminal = Criminal::find($id);
        $criminal->delete();        

        Cache::put('criminals', Criminal::all());
        return response()->json('The criminal successfully deleted');
    }
}
