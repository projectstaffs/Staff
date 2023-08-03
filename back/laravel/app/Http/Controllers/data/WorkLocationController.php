<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\WorkLocation;

class WorkLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkLocation::orderBy('created_at', 'desc')->get();
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
        $workLocation = new WorkLocation([
            'title' => $request->title
        ]);
                
        $workLocation->save();        
        return response()->json('The workLocation successfully added');
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
        $workLocation = WorkLocation::find($id);
        $workLocation->title = $request['title'];       

        $workLocation->save();
        return response()->json(["The workLocation successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workLocation = WorkLocation::find($id);
        $workLocation->delete();        

        return response()->json('The workLocation successfully deleted');
    }
}
