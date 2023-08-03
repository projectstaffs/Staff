<?php

namespace App\Http\Controllers\data;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\data\Smoking;

class SmokingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Smoking::orderBy('created_at', 'desc')->get();
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
        $smoking = new Smoking([
            'title' => $request->title
        ]);
                
        $smoking->save();        
        return response()->json('The smoking successfully added');
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
        $smoking = Smoking::find($id);
        $smoking->title = $request['title'];       

        $smoking->save();
        return response()->json(["The smoking successfully updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $smoking = Smoking::find($id);
        $smoking->delete();        

        return response()->json('The smoking successfully deleted');
    }
}
