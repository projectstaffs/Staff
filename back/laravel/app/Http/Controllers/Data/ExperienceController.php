<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('experiences')) { Cache::put('experiences', Experience::all()); }
        $getItems = Cache::get('experiences');
        return $getItems;
        //return Experience::orderBy('created_at', 'desc')->get();
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
        $experience = new Experience([
            'title' => $request->title
        ]);
        $experience->save();  
        
        Cache::put('experiences', Experience::all());
        return response()->json('The experience successfully added');
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
        $experience = Experience::find($id);
        $experience->title = $request['title'];
        $experience->save();

        Cache::put('experiences', Experience::all());
        return response()->json(["The experience successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::find($id);
        $experience->delete();        

        Cache::put('experiences', Experience::all());
        return response()->json('The experience successfully deleted');
    }
}
