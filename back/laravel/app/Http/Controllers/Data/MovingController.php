<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Moving;

class MovingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('movings')) { Cache::put('movings', Moving::all()); }
        $getItems = Cache::get('movings');
        return $getItems;
        //return Moving::orderBy('created_at', 'desc')->get();
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
        $moving = new Moving([
            'title' => $request->title
        ]);
        $moving->save(); 
        
        Cache::put('movings', Moving::all());
        return response()->json('The moving successfully added');
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
        $moving = Moving::find($id);
        $moving->title = $request['title'];
        $moving->save();

        Cache::put('movings', Moving::all());
        return response()->json(["The moving successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $moving = Moving::find($id);
        $moving->delete();        

        Cache::put('movings', Moving::all());
        return response()->json('The moving successfully deleted');
    }
}
