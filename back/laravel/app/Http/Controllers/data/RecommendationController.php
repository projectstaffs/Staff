<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\Recommendation;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Recommendation::orderBy('created_at', 'desc')->get();
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
        $recommendation = new Recommendation([
            'title' => $request->title
        ]);
                
        $recommendation->save();        
        return response()->json('The recommendation successfully added');
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
        $recommendation = Recommendation::find($id);
        $recommendation->title = $request['title'];       

        $recommendation->save();
        return response()->json(["The recommendation successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recommendation = Recommendation::find($id);
        $recommendation->delete();        

        return response()->json('The recommendation successfully deleted');
    }
}
