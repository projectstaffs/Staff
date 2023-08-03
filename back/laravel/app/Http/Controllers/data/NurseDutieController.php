<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\NurseDutie;

class NurseDutieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NurseDutie::orderBy('created_at', 'desc')->get();
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
        return response()->json(["The nurseDutie successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nurseDutie = NurseDutie::find($id);
        $nurseDutie->delete();        

        return response()->json('The nurseDutie successfully deleted');
    }
}
