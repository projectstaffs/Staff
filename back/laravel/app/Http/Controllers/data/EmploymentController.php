<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\Employment;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employment::orderBy('created_at', 'desc')->get();
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
        $employment = new Employment([
            'title' => $request->title
        ]);
                
        $employment->save();        
        return response()->json('The employment successfully added');
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
        $employment = Employment::find($id);
        $employment->title = $request['title'];       

        $employment->save();
        return response()->json(["The employment successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employment = Employment::find($id);
        $employment->delete();        

        return response()->json('The employment successfully deleted');
    }
}
