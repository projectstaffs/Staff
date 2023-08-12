<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\data\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('educations')) { Cache::put('educations', Education::all()); }
        $getItems = Cache::get('educations');
        return $getItems;
        //return Education::orderBy('created_at', 'desc')->get();
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
        $education = new Education([
            'title' => $request->title
        ]);
        $education->save(); 
        
        Cache::put('educations', Education::all());
        return response()->json('The education successfully added');
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
        $education = Education::find($id);
        $education->title = $request['title'];
        $education->save();

        Cache::put('educations', Education::all());
        return response()->json(["The education successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::find($id);
        $education->delete();        

        Cache::put('educations', Education::all());
        return response()->json('The education successfully deleted');
    }
}
