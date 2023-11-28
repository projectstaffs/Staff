<?php

namespace App\Http\Controllers\Data;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Data\NurseDutie;

class NurseDutieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('nurseduties')) { Cache::put('nurseduties', NurseDutie::all()); }
        $getItems = Cache::get('nurseduties');
        return $getItems;
        //return NurseDutie::orderBy('created_at', 'desc')->get();
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
        $nurseDutie = new NurseDutie([
            'title' => $request->title
        ]);
        $nurseDutie->save(); 
        
        Cache::put('nurseduties', NurseDutie::all());
        return response()->json('The nurseDutie successfully added');
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
        $nurseDutie = NurseDutie::find($id);
        $nurseDutie->title = $request['title'];
        $nurseDutie->save();

        Cache::put('nurseduties', NurseDutie::all());
        return response()->json(["The nurseDutie successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nurseDutie = NurseDutie::find($id);
        $nurseDutie->delete();        

        Cache::put('nurseduties', NurseDutie::all());
        return response()->json('The nurseDutie successfully deleted');
    }
}
